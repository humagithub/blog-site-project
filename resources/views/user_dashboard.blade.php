


@extends('User_Dashboard.Dashboard.User-Post.master')
@section('content')
            
                      




<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <div class="container">
                <h1 class="h2"> User Dashboard</h1>
                <p>This is the homepage of a simple admin interface which is part of a tutorial written on Themesberg</p>
                <div class="row my-4">
                    <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">Customers</h5>
                            <div class="card-body">
                              <h5 class="card-title">345k</h5>
                              <p class="card-text">Feb 1 - Apr 1, United States</p>
                              <p class="card-text text-success">18.2% increase since last month</p>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Revenue</h5>
                            <div class="card-body">
                              <h5 class="card-title">$2.4k</h5>
                              <p class="card-text">Feb 1 - Apr 1, United States</p>
                              <p class="card-text text-success">4.6% increase since last month</p>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Purchases</h5>
                            <div class="card-body">
                              <h5 class="card-title">43</h5>
                              <p class="card-text">Feb 1 - Apr 1, United States</p>
                              <p class="card-text text-danger">2.6% decrease since last month</p>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Traffic</h5>
                            <div class="card-body">
                              <h5 class="card-title">64k</h5>
                              <p class="card-text">Feb 1 - Apr 1, United States</p>
                              <p class="card-text text-success">2.5% increase since last month</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">Latest transactions</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">Order</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Date</th>
                                            <th scope="col"></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">17371705</th>
                                            <td>Volt Premium Bootstrap 5 Dashboard</td>
                                            <td>johndoe@gmail.com</td>
                                            <td>€61.11</td>
                                            <td>Aug 31 2020</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                          </tr>
                                          <tr>
                                            <th scope="row">17370540</th>
                                            <td>Pixel Pro Premium Bootstrap UI Kit</td>
                                            <td>jacob.monroe@company.com</td>
                                            <td>$153.11</td>
                                            <td>Aug 28 2020</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                          </tr>
                                          <tr>
                                            <th scope="row">17371705</th>
                                            <td>Volt Premium Bootstrap 5 Dashboard</td>
                                            <td>johndoe@gmail.com</td>
                                            <td>€61.11</td>
                                            <td>Aug 31 2020</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                          </tr>
                                          <tr>
                                            <th scope="row">17370540</th>
                                            <td>Pixel Pro Premium Bootstrap UI Kit</td>
                                            <td>jacob.monroe@company.com</td>
                                            <td>$153.11</td>
                                            <td>Aug 28 2020</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                          </tr>
                                          <tr>
                                            <th scope="row">17371705</th>
                                            <td>Volt Premium Bootstrap 5 Dashboard</td>
                                            <td>johndoe@gmail.com</td>
                                            <td>€61.11</td>
                                            <td>Aug 31 2020</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                          </tr>
                                          <tr>
                                            <th scope="row">17370540</th>
                                            <td>Pixel Pro Premium Bootstrap UI Kit</td>
                                            <td>jacob.monroe@company.com</td>
                                            <td>$153.11</td>
                                            <td>Aug 28 2020</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                </div>
                                <a href="#" class="btn btn-block btn-light">View all</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <h5 class="card-header">Traffic last 6 months</h5>
                            <div class="card-body">
                                <div id="traffic-chart"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line x1="50" x2="50" y1="15" y2="115" class="ct-grid ct-horizontal"></line><line x1="86.45659891764322" x2="86.45659891764322" y1="15" y2="115" class="ct-grid ct-horizontal"></line><line x1="122.91319783528645" x2="122.91319783528645" y1="15" y2="115" class="ct-grid ct-horizontal"></line><line x1="159.3697967529297" x2="159.3697967529297" y1="15" y2="115" class="ct-grid ct-horizontal"></line><line x1="195.8263956705729" x2="195.8263956705729" y1="15" y2="115" class="ct-grid ct-horizontal"></line><line x1="232.28299458821613" x2="232.28299458821613" y1="15" y2="115" class="ct-grid ct-horizontal"></line><line y1="115" y2="115" x1="50" x2="268.7395935058594" class="ct-grid ct-vertical"></line><line y1="86.42857142857143" y2="86.42857142857143" x1="50" x2="268.7395935058594" class="ct-grid ct-vertical"></line><line y1="57.857142857142854" y2="57.857142857142854" x1="50" x2="268.7395935058594" class="ct-grid ct-vertical"></line><line y1="29.285714285714292" y2="29.285714285714292" x1="50" x2="268.7395935058594" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><path d="M50,115L50,82.143C62.152,81.19,74.304,79.286,86.457,79.286C98.609,79.286,110.761,87.857,122.913,87.857C135.065,87.857,147.218,74.923,159.37,66.429C171.522,57.934,183.674,40.587,195.826,35C207.979,29.413,220.131,27.381,232.283,23.571L232.283,115Z" class="ct-area"></path><path d="M50,82.143C62.152,81.19,74.304,79.286,86.457,79.286C98.609,79.286,110.761,87.857,122.913,87.857C135.065,87.857,147.218,74.923,159.37,66.429C171.522,57.934,183.674,40.587,195.826,35C207.979,29.413,220.131,27.381,232.283,23.571" class="ct-line"></path><line x1="50" y1="82.14285714285714" x2="50.01" y2="82.14285714285714" class="ct-point" ct:value="23000"></line><line x1="86.45659891764322" y1="79.28571428571428" x2="86.46659891764322" y2="79.28571428571428" class="ct-point" ct:value="25000"></line><line x1="122.91319783528645" y1="87.85714285714286" x2="122.92319783528646" y2="87.85714285714286" class="ct-point" ct:value="19000"></line><line x1="159.3697967529297" y1="66.42857142857143" x2="159.37979675292968" y2="66.42857142857143" class="ct-point" ct:value="34000"></line><line x1="195.8263956705729" y1="35" x2="195.8363956705729" y2="35" class="ct-point" ct:value="56000"></line><line x1="232.28299458821613" y1="23.57142857142857" x2="232.29299458821612" y2="23.57142857142857" class="ct-point" ct:value="64000"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="50" y="120" width="36.45659891764323" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 36px; height: 20px;">January</span></foreignObject><foreignObject style="overflow: visible;" x="86.45659891764322" y="120" width="36.45659891764323" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 36px; height: 20px;">Februrary</span></foreignObject><foreignObject style="overflow: visible;" x="122.91319783528645" y="120" width="36.456598917643234" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 36px; height: 20px;">March</span></foreignObject><foreignObject style="overflow: visible;" x="159.3697967529297" y="120" width="36.45659891764322" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 36px; height: 20px;">April</span></foreignObject><foreignObject style="overflow: visible;" x="195.8263956705729" y="120" width="36.45659891764322" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 36px; height: 20px;">May</span></foreignObject><foreignObject style="overflow: visible;" x="232.28299458821613" y="120" width="36.45659891764325" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 36px; height: 20px;">June</span></foreignObject><foreignObject style="overflow: visible;" y="86.42857142857143" x="10" height="28.571428571428573" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 29px; width: 30px;">0</span></foreignObject><foreignObject style="overflow: visible;" y="57.85714285714286" x="10" height="28.571428571428573" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 29px; width: 30px;">20000</span></foreignObject><foreignObject style="overflow: visible;" y="29.285714285714292" x="10" height="28.571428571428562" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 29px; width: 30px;">40000</span></foreignObject><foreignObject style="overflow: visible;" y="-0.7142857142857082" x="10" height="30" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">60000</span></foreignObject></g></svg></div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
    </main>
</div>

