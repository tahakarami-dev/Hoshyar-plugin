jQuery(document).ready(function($) {
    $('.tab').click(function() {
        $('.tab').removeClass('active');
        $(this).addClass('active');
    
        $('.tab-content').removeClass('active');
        $('#' + $(this).data('tab')).addClass('active');
    });
    // Reposrts

    $(document).ready(function() {
        let chart;
        
        // تابع رسم نمودار
        function renderChart() {
            const ctx = document.getElementById('requests-chart').getContext('2d');
            
            // حذف نمودار قبلی اگر وجود دارد
            if (chart) {
                chart.destroy();
            }
            
            chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور'],
                    datasets: [{
                        label: 'تعداد درخواست‌های AI',
                        data: [850, 920, 1100, 1050, 1200, 1248],
                        borderColor: '#16c77a',
                        backgroundColor: 'rgba(74, 175, 119, 0.1)',
                        tension: 0.3,
                        fill: true,
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            rtl: true,
                            labels: {
                                font: {
                                    family: 'Tahoma'
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            ticks: {
                                font: {
                                    family: 'Tahoma'
                                }
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    family: 'Tahoma'
                                }
                            }
                        }
                    }
                }
            });
        }
        
        // شبیه‌سازی بروزرسانی دیتا
        function simulateDataRefresh() {
            $('#refresh-btn').html('<i class="fas fa-spinner fa-spin"></i> در حال بروزرسانی...');
            $('#refresh-btn').prop('disabled', true);
            
            setTimeout(() => {
                // اعداد تصادفی برای نمایش تغییرات
                const newRequests = Math.floor(Math.random() * 500) + 1000;
                const newContent = Math.floor(Math.random() * 30) + 50;
                const newResponse = (Math.random() * 1.5 + 1.5).toFixed(1);
                
                $('#total-requests').text(newRequests.toLocaleString());
                $('#total-content').text(newContent);
                $('#avg-response').text(newResponse + 's');
                
                $('#refresh-btn').html('<i class="fas fa-sync-alt"></i> بروزرسانی');
                $('#refresh-btn').prop('disabled', false);
            }, 1500);
        }
        
        // رویدادها
        $('#refresh-btn').click(simulateDataRefresh);
        $('#time-range').change(renderChart);
        $(window).resize(renderChart);
        
        // خروجی‌گیری
        $('#export-csv').click(() => {
            alert('خروجی CSV دانلود شد! (شبیه‌سازی)');
        });
        
        $('#export-json').click(() => {
            alert('خروجی JSON دانلود شد! (شبیه‌سازی)');
        });
        
        // اولین بار رسم نمودار
        renderChart();
    });
    //  System Status 

    // در بخش مربوط به تب سیستم
$('#refresh-status').click(function() {
    const btn = $(this);
    btn.addClass('refreshing');
    
    // شبیه‌سازی دریافت داده‌های جدید
    setTimeout(() => {
        // بروزرسانی زمان
        $('#last-update-time').text(new Date().toLocaleTimeString('fa-IR'));
        
        // تغییر وضعیت تصادفی برای نمایش داینامیک بودن
        const randomService = $('.status-card').eq(Math.floor(Math.random() * 4));
        const statuses = ['active', 'warning', 'error'];
        const randomStatus = statuses[Math.floor(Math.random() * statuses.length)];
        
        randomService.find('.status-badge')
            .removeClass('active warning error')
            .addClass(randomStatus)
            .text({
                'active': 'فعال',
                'warning': 'مشکل جزئی',
                'error': 'مشکل جدی'
            }[randomStatus]);
        
        btn.removeClass('refreshing');
    }, 1000);
});

// نمایش جزئیات سرویس
$('.details-btn').click(function() {
    const service = $(this).closest('.status-card').data('service');
    alert(`جزئیات فنی سرویس ${service} نمایش داده خواهد شد`);
});
// Help dashboard
// فعالسازی آکاردئون
$('.accordion-btn').click(function() {
    $(this).closest('.accordion-item').toggleClass('active')
        .siblings().removeClass('active');
});

// شبیه‌سازی دانلود
$('.download-btn').click(function() {
    const fileType = $(this).text().match(/\((.*?)\)/)[1];
    alert(`دریافت فایل راهنما با فرمت ${fileType} آغاز شد`);
});

// شبیه‌سازی پخش ویدئو
$('.video-thumbnail').click(function() {
    alert('پخش ویدئوی آموزشی در پنجره جدید');
});
})