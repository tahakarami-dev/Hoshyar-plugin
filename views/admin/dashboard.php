<?php
$current_user = wp_get_current_user()->user_login;


?>
<div class="hooshyar-dashboard">
    <div class="hooshyar-header">
        <div class="logo-holder">
            <img class="logo" src="<?php echo HYA_ASSETS . 'images/logotype.png' ?>" alt="">
        </div>
        <div class="notification">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 24 24">
                <path d="M 12 2 C 11.172 2 10.5 2.672 10.5 3.5 L 10.5 4.1953125 C 7.9131836 4.862095 6 7.2048001 6 10 L 6 16 L 4 18 L 4 19 L 10.269531 19 A 2 2 0 0 0 10 20 A 2 2 0 0 0 12 22 A 2 2 0 0 0 14 20 A 2 2 0 0 0 13.728516 19 L 20 19 L 20 18 L 18 16 L 18 10 C 18 7.2048001 16.086816 4.862095 13.5 4.1953125 L 13.5 3.5 C 13.5 2.672 12.828 2 12 2 z M 12 6 C 14.206 6 16 7.794 16 10 L 16 16 L 16 16.828125 L 16.171875 17 L 7.828125 17 L 8 16.828125 L 8 16 L 8 10 C 8 7.794 9.794 6 12 6 z"></path>
            </svg>
        </div>
    </div>
    <div class="container">
        <aside class="sidebar">
            <button class="tab active" data-tab="dashboard">داشبورد
                <img class="tab-icon" src="<?php echo HYA_ASSETS . 'images/icons8-dashboard.png' ?>" alt="">
            </button>
            <button class="tab" data-tab="Reports"> گزارشات
                <img class="tab-icon" src="<?php echo HYA_ASSETS . 'images/icons8-reports.png' ?>" alt="">
            </button>
            <button class="tab" data-tab="sysetm-info"> وضعیت سیستم
                <img class="tab-icon" src="<?php echo HYA_ASSETS . 'images/icons8-system-information.png' ?>" alt="">
            </button>
            <button class="tab" data-tab="Help"> راهنما
                <img class="tab-icon" src="<?php echo HYA_ASSETS . 'images/icons8-info.png' ?>" alt="">
            </button>
        </aside>
        <main class="content">
            <div id="dashboard" class="tab-content active">
            <div class="report-header">
                    <h1><i class="fas fa-chart-bar"></i> داشبورد</h1>
                    <div class="time-filter">
                   
                        <button id="refresh-btn"><i class="fas fa-sync-alt"></i> سلام <?php echo $current_user ?> عزیز</button>
                    </div>
                </div>
            <div class="alert">
                    <p class="alert-message">به افزونه دستیار هوش مصنوعی <b>هوشیار</b> خوش آمدید</p>
                </div>
                <div class="info-holder">
                    <div class="info-box">
                        <p>وضعیت افزونه</p>
                        <span>فعال</span>
                    </div>
                    <div class="info-box">
                        <p>نسخه افزونه</p>
                        <span>۱.۰.۰</span>
                    </div>
                    <div class="info-box">
                        <p>وضعیت سرویس ها</p>
                        <span>فعال</span>
                    </div>
                    <div class="info-box">
                        <p> تعداد خطاهای ثبت‌شده</p>
                        <span>۳</span>
                    </div>
                </div>
                <div class="Announcement">
                    <h3>اطلاعیه ها </h3>
                    <div class="Announcement-content">
                        <div class="content">
                            <img src="<?php echo HYA_ASSETS . 'images/a_modern_software_developer_working_at_a_high-tech_desk_surrounded_by_humanoid_robots_and_ai-powere_r0i9wx0sbkl0cn2zvo4o_3.png' ?>" alt="">
                            <span>آپدیت جدید افزونه هوشیار</span>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد</p>
                            <button>مشاهده</button>
                        </div>
                        <div class="content">
                            <img src="<?php echo HYA_ASSETS . 'images/a_modern_software_developer_working_at_a_high-tech_desk_surrounded_by_humanoid_robots_and_ai-powere_r0i9wx0sbkl0cn2zvo4o_3.png' ?>" alt="">
                            <span>آپدیت جدید افزونه هوشیار</span>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد</p>
                            <button>مشاهده</button>
                        </div>
                        <div class="content">
                            <img src="<?php echo HYA_ASSETS . 'images/a_modern_software_developer_working_at_a_high-tech_desk_surrounded_by_humanoid_robots_and_ai-powere_r0i9wx0sbkl0cn2zvo4o_3.png' ?>" alt="">
                            <span>آپدیت جدید افزونه هوشیار</span>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد</p>
                            <button>مشاهده</button>
                        </div>
                    </div>
                </div>            </div>

            <div id="Reports" class="tab-content">
                <div class="report-header">
                    <h1><i class="fas fa-chart-bar"></i> گزارش‌گیری</h1>
                    <div class="time-filter">
                        <select id="time-range">
                            <option value="daily">روزانه</option>
                            <option value="weekly">هفتگی</option>
                            <option value="monthly">ماهانه</option>
                        </select>
                        <button id="refresh-btn"><i class="fas fa-sync-alt"></i> بروزرسانی</button>
                    </div>
                </div>

                <div class="stats-cards">
                <div class="card">
                        <h3>درخواست‌های AI</h3>
                        <span class="value" id="total-requests">1,248</span>
                        <span class="change up"><i class="fas fa-arrow-up"></i> 12%</span>
                    </div>
                    <div class="card">
                        <h3>محتواهای تولیدشده</h3>
                        <span class="value" id="total-content">87</span>
                        <span class="change up"><i class="fas fa-arrow-up"></i> 5%</span>
                    </div>
                    <div class="card">
                        <h3>میانگین پاسخ‌گویی</h3>
                        <span class="value" id="avg-response">2.4s</span>
                        <span class="change down"><i class="fas fa-arrow-down"></i> 0.8%</span>
                    </div>                </div>

                <div class="chart-container">
                    <canvas id="requests-chart"></canvas>
                </div>

                <div class="export-buttons">
                    <button id="export-csv" class="export-btn"><i class="fas fa-file-csv"></i> خروجی CSV</button>
                    <button id="export-json" class="export-btn"><i class="fas fa-file-code"></i> خروجی JSON</button>
                </div>
            </div>

            <div id="sysetm-info" class="tab-content">
            <div class="report-header">
            <h1><i class="fas fa-heartbeat"></i> وضعیت سرویس‌ها</h1>
            <div class="last-updated">
            <span>آخرین بروزرسانی: </span>
            <span id="last-update-time">هم اکنون</span>
            <button id="refresh-status" class="refresh-btn">
                <i class="fas fa-sync-alt"></i>
            </button>
        </div>
                </div>

  

    <div class="health-status-grid">
        <!-- سرویس چت بات -->
        <div class="status-card" data-service="chatbot">
            <div class="status-header">
                <h3><i class="fas fa-robot"></i> چت بات هوشمند</h3>
                <span class="status-badge active">فعال</span>
            </div>
            <div class="status-metrics">
                <div class="metric">
                    <span class="metric-label">زمان پاسخگویی:</span>
                    <span class="metric-value">1.2s</span>
                </div>
                <div class="metric">
                    <span class="metric-label">درخواست‌های امروز:</span>
                    <span class="metric-value">248</span>
                </div>
            </div>
            <div class="status-footer">
                <div class="uptime">Uptime: 99.98%</div>
                <button class="details-btn">جزئیات فنی <i class="fas fa-chevron-left"></i></button>
            </div>
        </div>

        <!-- سرویس تولید محتوا -->
        <div class="status-card" data-service="content-generation">
            <div class="status-header">
                <h3><i class="fas fa-pen-fancy"></i> تولید محتوا</h3>
                <span class="status-badge active">فعال</span>
            </div>
            <div class="status-metrics">
                <div class="metric">
                    <span class="metric-label">تولید امروز:</span>
                    <span class="metric-value">18 محتوا</span>
                </div>
                <div class="metric">
                    <span class="metric-label">میانگین زمان:</span>
                    <span class="metric-value">4.7s</span>
                </div>
            </div>
            <div class="status-footer">
                <div class="uptime">Uptime: 99.95%</div>
                <button class="details-btn">جزئیات فنی <i class="fas fa-chevron-left"></i></button>
            </div>
        </div>

        <!-- سرویس پردازش تصاویر -->
        <div class="status-card" data-service="image-processing">
            <div class="status-header">
                <h3><i class="fas fa-image"></i> پردازش تصاویر</h3>
                <span class="status-badge warning">مشکل جزئی</span>
            </div>
            <div class="status-metrics">
                <div class="metric">
                    <span class="metric-label">پردازش امروز:</span>
                    <span class="metric-value">9 تصویر</span>
                </div>
                <div class="metric">
                    <span class="metric-label">خطاهای اخیر:</span>
                    <span class="metric-value">2 مورد</span>
                </div>
            </div>
            <div class="status-footer">
                <div class="uptime">Uptime: 98.2%</div>
                <button class="details-btn">جزئیات فنی <i class="fas fa-chevron-left"></i></button>
            </div>
        </div>

        <!-- سرویس آنالیز داده -->
        <div class="status-card" data-service="data-analysis">
            <div class="status-header">
                <h3><i class="fas fa-chart-line"></i> تحلیل داده‌ها</h3>
                <span class="status-badge active">فعال</span>
            </div>
            <div class="status-metrics">
                <div class="metric">
                    <span class="metric-label">دیتاست‌های فعال:</span>
                    <span class="metric-value">3 مجموعه</span>
                </div>
                <div class="metric">
                    <span class="metric-label">حافظه مصرفی:</span>
                    <span class="metric-value">1.2GB</span>
                </div>
            </div>
            <div class="status-footer">
                <div class="uptime">Uptime: 100%</div>
                <button class="details-btn">جزئیات فنی <i class="fas fa-chevron-left"></i></button>
            </div>
        </div>
    </div>

    <!-- لاگ‌های سیستم -->
    <div class="system-logs">
        <h3><i class="fas fa-terminal"></i> آخرین رویدادهای سیستم</h3>
        <div class="log-container">
            <div class="log-entry success">
                <span class="log-time">14:32:45</span>
                <span class="log-message">سرویس چت بات با موفقیت راه‌اندازی شد</span>
            </div>
            <div class="log-entry warning">
                <span class="log-time">14:30:12</span>
                <span class="log-message">تاخیر در پاسخگویی سرویس پردازش تصاویر</span>
            </div>
            <div class="log-entry info">
                <span class="log-time">14:28:03</span>
                <span class="log-message">بروزرسانی خودکار انجام شد (v1.2.0)</span>
            </div>
        </div>
    </div>            </div>

    <div id="Help" class="tab-content">
    <div class="report-header">
                    <h1><i class="fas fa-chart-bar"></i> راهنما</h1>
                    <div class="time-filter">
                   
                        <button id="refresh-btn"><i class="fas fa-sync-alt"></i> پشتیبانی</button>
                    </div>
                </div>

    <div class="help-sections">
        <!-- بخش راهنمای سریع -->
        <div class="help-card quick-start">
            <div class="help-card-header">
                <i class="fas fa-rocket"></i>
                <h3>شروع سریع</h3>
            </div>
            <div class="help-card-content">
                <ol class="step-list">
                    <li>وارد پنل مدیریت هوشیار شوید</li>
                    <li>از تب "داشبورد" وضعیت کلی را بررسی کنید</li>
                    <li>برای تولید محتوا از بخش مربوطه استفاده نمایید</li>
                    <li>گزارشات عملکرد را از تب "گزارشات" مشاهده کنید</li>
                </ol>
                <div class="video-tutorial">
                    <div class="video-thumbnail">
                        <img src="<?php echo HYA_ASSETS . 'images/Banner.png' ?>" alt="ویدئوی آموزشی">
                    </div>
                    <span>ویدئوی آموزشی شروع سریع (2:45 دقیقه)</span>
                </div>
            </div>
        </div>

        <!-- بخش سوالات متداول -->
        <div class="help-card faq">
            <div class="help-card-header">
                <i class="fas fa-comment-alt"></i>
                <h3>سوالات متداول</h3>
            </div>
            <div class="help-card-content">
                <div class="accordion">
                    <div class="accordion-item">
                        <button class="accordion-btn">
                            چگونه می‌توانم از چت بات استفاده کنم؟
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="accordion-content">
                            <p>پس از فعالسازی افزونه، از بخش "چت بات" در پنل مدیریت یا از طریق ویجت در سایت می‌توانید استفاده کنید.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-btn">
                            محدودیت تولید محتوا چقدر است؟
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="accordion-content">
                            <p>بر اساس پلن اشتراک شما متفاوت است. در پلن پایه تا 100 محتوای ماهانه امکان تولید دارید.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- بخش دانلود راهنما -->
        <div class="help-card download-section">
            <div class="help-card-header">
                <i class="fas fa-file-powerpoint"></i>
                <h3>مستندات کامل</h3>
            </div>
            <div class="help-card-content">
                <div class="download-item">
                    <div class="file-info">
                        <i class="fas fa-file-powerpoint file-icon"></i>
                        <div>
                            <h4>راهنمای جامع هوشیار</h4>
                            <span>نسخه 1.0 - آخرین بروزرسانی: 1402/05/15</span>
                        </div>
                    </div>
                    <button class="download-btn">
                        <i class="fas fa-download"></i> دانلود (PDF)
                    </button>
                </div>
                <div class="download-item">
                    <div class="file-info">
                        <i class="fas fa-file-powerpoint file-icon"></i>
                        <div>
                            <h4>پاورپوینت آموزشی</h4>
                            <span>شامل اسلایدهای آموزش گام به گام</span>
                        </div>
                    </div>
                    <button class="download-btn">
                        <i class="fas fa-download"></i> دانلود (PPTX)
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- پشتیبانی -->
    <div class="support-section">
        <div class="support-card">
            <i class="fas fa-headset"></i>
            <h3>نیاز به کمک دارید؟</h3>
            <p>تیم پشتیبانی هوشیار 24 ساعته آماده پاسخگویی به شماست</p>
            <div class="support-contacts">
                <a href="#" class="support-link">
                    <i class="fas fa-envelope"></i> support@hooshyar.ai
                </a>
                <a href="#" class="support-link">
                    <i class="fas fa-phone"></i> 09213254840
                </a>
            </div>
        </div>
    </div>
</div>
        </main>
    </div>
</div>