<div id="Reports" class="tab-content">
                <div class="content-header">
                    <h1> گزارش‌گیری</h1>
                    <div class="content-info">
                        <select id="time-range">
                            <option value="daily">روزانه</option>
                            <option value="weekly">هفتگی</option>
                            <option value="monthly">ماهانه</option>
                        </select>
                        <button id="refresh-btn"> بروزرسانی</button>
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