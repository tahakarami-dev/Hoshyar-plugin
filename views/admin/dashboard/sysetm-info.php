<div id="sysetm-info" class="tab-content">
                <div class="content-header">
                    <h1> وضعیت سرویس‌ها</h1>
                    <div class="last-updated">
                        <span>آخرین بروزرسانی: </span>
                        <span id="last-update-time">هم اکنون</span>
                        <button id="refresh-status" class="content-btn">
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
                </div>
            </div>