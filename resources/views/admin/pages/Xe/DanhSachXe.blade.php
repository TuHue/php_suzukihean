@extends('admin.layout.master')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh Sách Xe</h4>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <div class="d-flex align-items-center mr-3">
                   
                    <button type="button" class="btn btn-primary btn-sm btn-icon-text">
                      Add
                      <i class="typcn typcn typcn-plus btn-icon-append"></i>                          
                    </button>
                  </div>
                <ul class="navbar-nav navbar-nav-right">
                  <li class="nav-item nav-search d-none d-md-block mr-0">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search..." aria-label="search" aria-describedby="search">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="search">
                          <i class="typcn typcn-zoom"></i>
                        </span>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            <div class="table-responsive">
                <div class="table-responsive pt-3">
                    <table class="table table-striped project-orders-table">
                      <thead>
                        <tr>
                          <th class="ml-5">ID</th>
                          <th>Project name</th>
                          <th>Customer</th>
                          <th>Deadline</th>
                          <th>Payouts	</th>
                          <th>Traffic</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>#D1</td>
                          <td>Consectetur adipisicing elit </td>
                          <td>Beulah Cummings</td>
                          <td>03 Jan 2019</td>
                          <td>$ 5235</td>
                          <td>1.3K</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                Edit
                                <i class="typcn typcn-edit btn-icon-append"></i>                          
                              </button>
                              <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                                Delete
                                <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>#D2</td>
                          <td>Correlation natural resources silo</td>
                          <td>Mitchel Dunford</td>
                          <td>09 Oct 2019</td>
                          <td>$ 3233</td>
                          <td>5.4K</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                Edit
                                <i class="typcn typcn-edit btn-icon-append"></i>                          
                              </button>
                              <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                                Delete
                                <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>#D3</td>
                          <td>social capital compassion social</td>
                          <td>Pei Canaday</td>
                          <td>18 Jun 2019</td>
                          <td>$ 4311</td>
                          <td>2.1K</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                Edit
                                <i class="typcn typcn-edit btn-icon-append"></i>                          
                              </button>
                              <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                                Delete
                                <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>#D4</td>
                          <td>empower communities thought</td>
                          <td>Gaynell Sharpton</td>
                          <td>23 Mar 2019</td>
                          <td>$ 7743</td>
                          <td>2.7K</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                Edit
                                <i class="typcn typcn-edit btn-icon-append"></i>                          
                              </button>
                              <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                                Delete
                                <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>#D5</td>
                          <td> Targeted effective; mobilize </td>
                          <td>Audrie Midyett</td>
                          <td>22 Aug 2019</td>
                          <td>$ 2455</td>
                          <td>1.2K</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                Edit
                                <i class="typcn typcn-edit btn-icon-append"></i>                          
                              </button>
                              <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                                Delete
                                <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                              </button>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection