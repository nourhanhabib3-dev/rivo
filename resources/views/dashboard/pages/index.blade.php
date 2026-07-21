@extends('dashboard.layout.main')

@section('body')


      <!-- Page Content -->
      <main class="rivo-content">
        <!-- Welcome Section -->
        <section class="rivo-welcome">
          <h2>Welcome back, {{Auth::guard('dash')->user()->name}}! 👋</h2>
          <p>Here's what's happening with your store today. You have 12 new orders and 5 pending messages.</p>
          <a href="orders.html" class="btn btn-rivo">View Orders</a>
        </section>

        <!-- Statistics Cards -->
        <section class="row g-4 mb-4">
          <div class="col-sm-6 col-xl-3">
            <div class="rivo-stat-card animate-in">
              <div>
                <div class="rivo-stat-card__label">Total Revenue</div>
                <div class="rivo-stat-card__value">$48,290</div>
                <span class="rivo-stat-card__change up"><i class="bi bi-arrow-up"></i> 12.5%</span>
              </div>
              <div class="rivo-stat-card__icon yellow"><i class="bi bi-currency-dollar"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="rivo-stat-card animate-in">
              <div>
                <div class="rivo-stat-card__label">Total Orders</div>
                <div class="rivo-stat-card__value">1,284</div>
                <span class="rivo-stat-card__change up"><i class="bi bi-arrow-up"></i> 8.2%</span>
              </div>
              <div class="rivo-stat-card__icon green"><i class="bi bi-cart-check"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="rivo-stat-card animate-in">
              <div>
                <div class="rivo-stat-card__label">Total Users</div>
                <div class="rivo-stat-card__value">3,847</div>
                <span class="rivo-stat-card__change up"><i class="bi bi-arrow-up"></i> 5.1%</span>
              </div>
              <div class="rivo-stat-card__icon blue"><i class="bi bi-people"></i></div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="rivo-stat-card animate-in">
              <div>
                <div class="rivo-stat-card__label">Products Sold</div>
                <div class="rivo-stat-card__value">9,562</div>
                <span class="rivo-stat-card__change down"><i class="bi bi-arrow-down"></i> 2.3%</span>
              </div>
              <div class="rivo-stat-card__icon purple"><i class="bi bi-box-seam"></i></div>
            </div>
          </div>
        </section>

        <div class="row g-4">
          <!-- Sales Chart -->
          <div class="col-lg-8">
            <div class="rivo-card">
              <div class="rivo-card__header">
                <h3 class="rivo-card__title">Sales Overview</h3>
                <select class="form-select form-select-sm" style="width: auto;">
                  <option>Last 7 days</option>
                  <option>Last 30 days</option>
                </select>
              </div>
              <div class="rivo-card__body">
                <div class="rivo-chart">
                  <div class="rivo-chart__bar-wrap">
                    <div class="rivo-chart__bar" data-height="80" style="height: 80px;"></div>
                    <span class="rivo-chart__label">Mon</span>
                  </div>
                  <div class="rivo-chart__bar-wrap">
                    <div class="rivo-chart__bar" data-height="120" style="height: 120px;"></div>
                    <span class="rivo-chart__label">Tue</span>
                  </div>
                  <div class="rivo-chart__bar-wrap">
                    <div class="rivo-chart__bar" data-height="95" style="height: 95px;"></div>
                    <span class="rivo-chart__label">Wed</span>
                  </div>
                  <div class="rivo-chart__bar-wrap">
                    <div class="rivo-chart__bar" data-height="160" style="height: 160px;"></div>
                    <span class="rivo-chart__label">Thu</span>
                  </div>
                  <div class="rivo-chart__bar-wrap">
                    <div class="rivo-chart__bar" data-height="140" style="height: 140px;"></div>
                    <span class="rivo-chart__label">Fri</span>
                  </div>
                  <div class="rivo-chart__bar-wrap">
                    <div class="rivo-chart__bar" data-height="180" style="height: 180px;"></div>
                    <span class="rivo-chart__label">Sat</span>
                  </div>
                  <div class="rivo-chart__bar-wrap">
                    <div class="rivo-chart__bar" data-height="150" style="height: 150px;"></div>
                    <span class="rivo-chart__label">Sun</span>
                  </div>
                </div>
                <div class="row g-3 mt-3">
                  <div class="col-4">
                    <div class="rivo-sales-mini">
                      <div class="rivo-sales-mini__value">$12,450</div>
                      <div class="rivo-sales-mini__label">Online Sales</div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="rivo-sales-mini">
                      <div class="rivo-sales-mini__value">$8,920</div>
                      <div class="rivo-sales-mini__label">Retail Sales</div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="rivo-sales-mini">
                      <div class="rivo-sales-mini__value">$4,680</div>
                      <div class="rivo-sales-mini__label">Wholesale</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Progress & Activity -->
          <div class="col-lg-4">
            <div class="rivo-card mb-4">
              <div class="rivo-card__header">
                <h3 class="rivo-card__title">Monthly Goals</h3>
              </div>
              <div class="rivo-card__body">
                <div class="rivo-progress-item">
                  <div class="rivo-progress-item__header">
                    <span>Revenue Target</span>
                    <span>78%</span>
                  </div>
                  <div class="rivo-progress">
                    <div class="rivo-progress__bar" data-width="78" style="width: 78%;"></div>
                  </div>
                </div>
                <div class="rivo-progress-item">
                  <div class="rivo-progress-item__header">
                    <span>New Customers</span>
                    <span>65%</span>
                  </div>
                  <div class="rivo-progress">
                    <div class="rivo-progress__bar" data-width="65" style="width: 65%;"></div>
                  </div>
                </div>
                <div class="rivo-progress-item">
                  <div class="rivo-progress-item__header">
                    <span>Product Launches</span>
                    <span>92%</span>
                  </div>
                  <div class="rivo-progress">
                    <div class="rivo-progress__bar" data-width="92" style="width: 92%;"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="rivo-card">
              <div class="rivo-card__header">
                <h3 class="rivo-card__title">Activity Timeline</h3>
              </div>
              <div class="rivo-card__body">
                <div class="rivo-timeline">
                  <div class="rivo-timeline__item">
                    <div class="rivo-timeline__dot"></div>
                    <div class="rivo-timeline__title">Order #RV-2847 shipped</div>
                    <div class="rivo-timeline__time">10 min ago</div>
                    <div class="rivo-timeline__desc">Package sent to James Wilson</div>
                  </div>
                  <div class="rivo-timeline__item">
                    <div class="rivo-timeline__dot"></div>
                    <div class="rivo-timeline__title">New product added</div>
                    <div class="rivo-timeline__time">2 hours ago</div>
                    <div class="rivo-timeline__desc">Wireless Earbuds Pro listed</div>
                  </div>
                  <div class="rivo-timeline__item">
                    <div class="rivo-timeline__dot"></div>
                    <div class="rivo-timeline__title">Payment received</div>
                    <div class="rivo-timeline__time">5 hours ago</div>
                    <div class="rivo-timeline__desc">$249.00 from Emma Davis</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row g-4 mt-1">
          <!-- Recent Orders -->
          <div class="col-lg-8">
            <div class="rivo-card">
              <div class="rivo-card__header">
                <h3 class="rivo-card__title">Recent Orders</h3>
                <a href="orders.html" class="btn btn-sm btn-rivo-outline">View All</a>
              </div>
              <div class="table-responsive">
                <table class="table rivo-table mb-0">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Customer</th>
                      <th>Amount</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>#RV-2847</strong></td>
                      <td>
                        <div class="rivo-table__user">
                          <img src="https://i.pravatar.cc/150?u=james" alt="">
                          <span>James Wilson</span>
                        </div>
                      </td>
                      <td>$189.00</td>
                      <td><span class="rivo-badge success">Delivered</span></td>
                    </tr>
                    <tr>
                      <td><strong>#RV-2846</strong></td>
                      <td>
                        <div class="rivo-table__user">
                          <img src="https://i.pravatar.cc/150?u=emma" alt="">
                          <span>Emma Davis</span>
                        </div>
                      </td>
                      <td>$249.00</td>
                      <td><span class="rivo-badge warning">Processing</span></td>
                    </tr>
                    <tr>
                      <td><strong>#RV-2845</strong></td>
                      <td>
                        <div class="rivo-table__user">
                          <img src="https://i.pravatar.cc/150?u=michael" alt="">
                          <span>Michael Brown</span>
                        </div>
                      </td>
                      <td>$79.50</td>
                      <td><span class="rivo-badge info">Shipped</span></td>
                    </tr>
                    <tr>
                      <td><strong>#RV-2844</strong></td>
                      <td>
                        <div class="rivo-table__user">
                          <img src="https://i.pravatar.cc/150?u=sophia" alt="">
                          <span>Sophia Lee</span>
                        </div>
                      </td>
                      <td>$420.00</td>
                      <td><span class="rivo-badge success">Delivered</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Latest Users -->
          <div class="col-lg-4">
            <div class="rivo-card">
              <div class="rivo-card__header">
                <h3 class="rivo-card__title">Latest Users</h3>
                <a href="users.html" class="btn btn-sm btn-rivo-outline">View All</a>
              </div>
              <div class="rivo-card__body">
                <div class="rivo-user-list__item">
                  <img src="https://i.pravatar.cc/150?u=olivia" alt="">
                  <div>
                    <strong>Olivia Martin</strong>
                    <div class="small text-muted">olivia@email.com</div>
                  </div>
                  <span class="rivo-badge success">Active</span>
                </div>
                <div class="rivo-user-list__item">
                  <img src="https://i.pravatar.cc/150?u=noah" alt="">
                  <div>
                    <strong>Noah Thompson</strong>
                    <div class="small text-muted">noah@email.com</div>
                  </div>
                  <span class="rivo-badge success">Active</span>
                </div>
                <div class="rivo-user-list__item">
                  <img src="https://i.pravatar.cc/150?u=ava" alt="">
                  <div>
                    <strong>Ava Rodriguez</strong>
                    <div class="small text-muted">ava@email.com</div>
                  </div>
                  <span class="rivo-badge warning">Pending</span>
                </div>
                <div class="rivo-user-list__item">
                  <img src="https://i.pravatar.cc/150?u=liam" alt="">
                  <div>
                    <strong>Liam Carter</strong>
                    <div class="small text-muted">liam@email.com</div>
                  </div>
                  <span class="rivo-badge success">Active</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>


@endsection
