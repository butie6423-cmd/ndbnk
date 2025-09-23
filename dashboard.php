<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nedbank Online Banking - Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }

        .header {
            background: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #00a651;
        }

        .user-welcome {
            text-align: right;
        }

        .user-welcome h1 {
            font-size: 1.2rem;
            font-weight: 400;
            color: #333;
        }

        .user-welcome p {
            font-size: 0.9rem;
            color: #666;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem 2rem;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 2rem;
        }

        .main-content {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .section {
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #333;
            border-bottom: 2px solid #00a651;
            padding-bottom: 0.5rem;
        }

        .account-list {
            list-style: none;
        }

        .account-item {
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            padding: 1rem;
            margin-bottom: 1rem;
            background: #fafafa;
        }

        .account-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .account-name {
            font-weight: 600;
            color: #333;
        }

        .account-number {
            font-size: 0.9rem;
            color: #666;
        }

        .account-balances {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .balance-item {
            text-align: center;
        }

        .balance-label {
            font-size: 0.8rem;
            color: #666;
            margin-bottom: 0.3rem;
        }

        .balance-amount {
            font-weight: 600;
            color: #333;
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-top: 1rem;
        }

        .action-btn {
            background: #00a651;
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background 0.3s;
        }

        .action-btn:hover {
            background: #008a44;
        }

        .transaction-list {
            list-style: none;
        }

        .transaction-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #e0e0e0;
        }

        .transaction-item:last-child {
            border-bottom: none;
        }

        .transaction-info {
            flex: 1;
        }

        .transaction-description {
            font-weight: 500;
            color: #333;
        }

        .transaction-date {
            font-size: 0.8rem;
            color: #666;
        }

        .transaction-amount {
            font-weight: 600;
            color: #333;
        }

        .transaction-amount.negative {
            color: #e74c3c;
        }

        .transaction-amount.positive {
            color: #00a651;
        }

        .sidebar {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            height: fit-content;
        }

        .profile-section {
            text-align: center;
            margin-bottom: 2rem;
        }

        .profile-icon {
            width: 80px;
            height: 80px;
            background: #00a651;
            border-radius: 50%;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
        }

        .profile-name {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .profile-email {
            color: #666;
            font-size: 0.9rem;
        }

        .security-status {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 2rem;
        }

        .security-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .security-level {
            font-size: 0.9rem;
            color: #00a651;
            margin-bottom: 1rem;
        }

        .security-progress {
            height: 6px;
            background: #e0e0e0;
            border-radius: 3px;
            overflow: hidden;
        }

        .security-progress-bar {
            height: 100%;
            background: #00a651;
            width: 85%;
        }

        .notifications {
            list-style: none;
        }

        .notification-item {
            padding: 1rem;
            border-left: 3px solid #00a651;
            background: #f8f9fa;
            margin-bottom: 1rem;
            border-radius: 0 4px 4px 0;
        }

        .notification-title {
            font-weight: 600;
            margin-bottom: 0.3rem;
            color: #333;
        }

        .notification-message {
            font-size: 0.9rem;
            color: #666;
        }

        .footer {
            text-align: center;
            padding: 2rem;
            color: #666;
            font-size: 0.9rem;
            border-top: 1px solid #e0e0e0;
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            
            .account-balances {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .quick-actions {
                grid-template-columns: 1fr;
            }
            
            .header {
                padding: 1rem;
            }
            
            .container {
                padding: 0 1rem 1rem;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo"><img src="logo.png" style="width: 100px;"></div>
        <div class="user-welcome">
            <h1>Welcome back</h1>
            <p>Last login: <?php echo date('Y-m-d H:i:s'); ?></p>
        </div>
    </header>

    <div class="container">
        <div class="dashboard-grid">
            <main class="main-content">
                <div class="section">
                    <h2 class="section-title">My Accounts</h2>
                    <ul class="account-list">
                        <li class="account-item">
                            <div class="account-header">
                                <span class="account-name">Savings Account</span>
                                <span class="account-number">**** 1234</span>
                            </div>
                            <div class="account-balances">
                                <div class="balance-item">
                                    <div class="balance-label">Available Balance</div>
                                    <div class="balance-amount">R 45,678.90</div>
                                </div>
                                <div class="balance-item">
                                    <div class="balance-label">Current Balance</div>
                                    <div class="balance-amount">R 45,678.90</div>
                                </div>
                                <div class="balance-item">
                                    <div class="balance-label">Overdraft</div>
                                    <div class="balance-amount">R 10,000.00</div>
                                </div>
                                <div class="balance-item">
                                    <div class="balance-label">Interest Rate</div>
                                    <div class="balance-amount">4.25%</div>
                                </div>
                            </div>
                        </li>
                        
                        <li class="account-item">
                            <div class="account-header">
                                <span class="account-name">Cheque Account</span>
                                <span class="account-number">**** 5678</span>
                            </div>
                            <div class="account-balances">
                                <div class="balance-item">
                                    <div class="balance-label">Available Balance</div>
                                    <div class="balance-amount">R 23,456.78</div>
                                </div>
                                <div class="balance-item">
                                    <div class="balance-label">Current Balance</div>
                                    <div class="balance-amount">R 23,456.78</div>
                                </div>
                                <div class="balance-item">
                                    <div class="balance-label">Overdraft</div>
                                    <div class="balance-amount">R 15,000.00</div>
                                </div>
                                <div class="balance-item">
                                    <div class="balance-label">Monthly Fee</div>
                                    <div class="balance-amount">R 105.00</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    
                    <div class="quick-actions">
                        <button class="action-btn">Transfer Money</button>
                        <button class="action-btn">Pay Bills</button>
                        <button class="action-btn">Buy Airtime</button>
                    </div>
                </div>

                <div class="section">
                    <h2 class="section-title">Recent Transactions</h2>
                    <ul class="transaction-list">
                        <li class="transaction-item">
                            <div class="transaction-info">
                                <div class="transaction-description">Grocery Store Purchase</div>
                                <div class="transaction-date">2024-01-15 14:30</div>
                            </div>
                            <div class="transaction-amount negative">-R 456.78</div>
                        </li>
                        <li class="transaction-item">
                            <div class="transaction-info">
                                <div class="transaction-description">Salary Deposit</div>
                                <div class="transaction-date">2024-01-10 08:15</div>
                            </div>
                            <div class="transaction-amount positive">+R 15,000.00</div>
                        </li>
                        <li class="transaction-item">
                            <div class="transaction-info">
                                <div class="transaction-description">Electricity Payment</div>
                                <div class="transaction-date">2024-01-05 16:45</div>
                            </div>
                            <div class="transaction-amount negative">-R 890.25</div>
                        </li>
                        <li class="transaction-item">
                            <div class="transaction-info">
                                <div class="transaction-description">Online Shopping</div>
                                <div class="transaction-date">2024-01-03 11:20</div>
                            </div>
                            <div class="transaction-amount negative">-R 1,234.56</div>
                        </li>
                    </ul>
                </div>
            </main>

            <aside class="sidebar">
               

                <div class="security-status">
                    <div class="security-title">Security Status</div>
                    <div class="security-level">High Security</div>
                    <div class="security-progress">
                        <div class="security-progress-bar"></div>
                    </div>
                </div>

                <div class="section">
                    <h2 class="section-title">Notifications</h2>
                    <ul class="notifications">
                        <li class="notification-item">
                            <div class="notification-title">Security Update</div>
                            <div class="notification-message">Your profile security has been enhanced.</div>
                        </li>
                        <li class="notification-item">
                            <div class="notification-title">New Feature</div>
                            <div class="notification-message">Try our new mobile banking app.</div>
                        </li>
                        <li class="notification-item">
                            <div class="notification-title">Account Alert</div>
                            <div class="notification-message">Your statement is ready for download.</div>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>

    <footer class="footer">
        <p>Nedbank Limited (Reg No 1951/000009/06). Licensed financial services and registered credit provider (NCRCP16).</p>
        <p>© 2024 Nedbank. All rights reserved.</p>
    </footer>

    <script>
        // Simple dashboard interactions
        document.querySelectorAll('.action-btn').forEach(button => {
            button.addEventListener('click', function() {
                alert('This feature would redirect to the appropriate service page.');
            });
        });
    </script>
</body>
</html>