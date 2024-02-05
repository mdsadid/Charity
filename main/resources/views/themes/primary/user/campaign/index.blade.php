@extends($activeTheme . 'layouts.frontend')

@section('page_content')
    <div class="dashboard py-60">
        <div class="container">
            <div class="card custom--card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <form class="input--group">
                            <input type="text" class="form--control" placeholder="Search by title">
                            <button class="btn btn--sm btn--base"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <table class="table table-striped table-borderless table--responsive--xl">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Title</th>
                                <th>Goal</th>
                                <th>Fund Raised</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="S.N">01</td>
                                <td data-label="Title"><span class="text-overflow-1 text--base">Education for Every Child: Donate to Break the Cycle of Poverty</span></td>
                                <td data-label="Goal">$8,500.00</td>
                                <td data-label="Fund Raised">$12,500.00</td>
                                <td data-label="Deadline">
                                    <span>
                                        <span class="d-block">2023-01-30</span>
                                    </span>
                                </td>
                                <td data-label="Status"><span class="badge badge--info">Approved</span></td>
                                <td data-label="Action">
                                    <div class="custom--dropdown dropdown-sm">
                                        <button class="btn btn--sm btn-outline--base dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-pen-to-square text--info"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="donation-details.html"><i class="fa-regular fa-eye text--danger"></i> Details</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="S.N">02</td>
                                <td data-label="Title"><span class="text-overflow-1 text--base">Education for Every Child: Donate to Break the Cycle of Poverty</span></td>
                                <td data-label="Goal">$8,500.00</td>
                                <td data-label="Fund Raised">$12,500.00</td>
                                <td data-label="Deadline">
                                    <span>
                                        <span class="d-block">2023-01-30</span>
                                    </span>
                                </td>
                                <td data-label="Status"><span class="badge badge--warning">Pending</span></td>
                                <td data-label="Action">
                                    <div class="custom--dropdown dropdown-sm">
                                        <button class="btn btn--sm btn-outline--base dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-pen-to-square text--info"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="donation-details.html"><i class="fa-regular fa-eye text--danger"></i> Details</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="S.N">03</td>
                                <td data-label="Title"><span class="text-overflow-1 text--base">Education for Every Child: Donate to Break the Cycle of Poverty</span></td>
                                <td data-label="Goal">$8,500.00</td>
                                <td data-label="Fund Raised">$12,500.00</td>
                                <td data-label="Deadline">
                                    <span>
                                        <span class="d-block">2023-01-30</span>
                                    </span>
                                </td>
                                <td data-label="Status"><span class="badge badge--danger">Rejected</span></td>
                                <td data-label="Action">
                                    <div class="custom--dropdown dropdown-sm">
                                        <button class="btn btn--sm btn-outline--base dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-pen-to-square text--info"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="donation-details.html"><i class="fa-regular fa-eye text--danger"></i> Details</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="S.N">04</td>
                                <td data-label="Title"><span class="text-overflow-1 text--base">Education for Every Child: Donate to Break the Cycle of Poverty</span></td>
                                <td data-label="Goal">$8,500.00</td>
                                <td data-label="Fund Raised">$12,500.00</td>
                                <td data-label="Deadline">
                                    <span>
                                        <span class="d-block">2023-01-30</span>
                                    </span>
                                </td>
                                <td data-label="Status"><span class="badge badge--secondary">Expired</span></td>
                                <td data-label="Action">
                                    <div class="custom--dropdown dropdown-sm">
                                        <button class="btn btn--sm btn-outline--base dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-pen-to-square text--info"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="donation-details.html"><i class="fa-regular fa-eye text--danger"></i> Details</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="S.N">05</td>
                                <td data-label="Title"><span class="text-overflow-1 text--base">Education for Every Child: Donate to Break the Cycle of Poverty</span></td>
                                <td data-label="Goal">$8,500.00</td>
                                <td data-label="Fund Raised">$12,500.00</td>
                                <td data-label="Deadline">
                                    <span>
                                        <span class="d-block">2023-01-30</span>
                                    </span>
                                </td>
                                <td data-label="Status"><span class="badge badge--info">Approved</span></td>
                                <td data-label="Action">
                                    <div class="custom--dropdown dropdown-sm">
                                        <button class="btn btn--sm btn-outline--base dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-pen-to-square text--info"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="donation-details.html"><i class="fa-regular fa-eye text--danger"></i> Details</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="S.N">06</td>
                                <td data-label="Title"><span class="text-overflow-1 text--base">Education for Every Child: Donate to Break the Cycle of Poverty</span></td>
                                <td data-label="Goal">$8,500.00</td>
                                <td data-label="Fund Raised">$12,500.00</td>
                                <td data-label="Deadline">
                                    <span>
                                        <span class="d-block">2023-01-30</span>
                                    </span>
                                </td>
                                <td data-label="Status"><span class="badge badge--warning">Pending</span></td>
                                <td data-label="Action">
                                    <div class="custom--dropdown dropdown-sm">
                                        <button class="btn btn--sm btn-outline--base dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-pen-to-square text--info"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="donation-details.html"><i class="fa-regular fa-eye text--danger"></i> Details</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="S.N">07</td>
                                <td data-label="Title"><span class="text-overflow-1 text--base">Education for Every Child: Donate to Break the Cycle of Poverty</span></td>
                                <td data-label="Goal">$8,500.00</td>
                                <td data-label="Fund Raised">$12,500.00</td>
                                <td data-label="Deadline">
                                    <span>
                                        <span class="d-block">2023-01-30</span>
                                    </span>
                                </td>
                                <td data-label="Status"><span class="badge badge--danger">Rejected</span></td>
                                <td data-label="Action">
                                    <div class="custom--dropdown dropdown-sm">
                                        <button class="btn btn--sm btn-outline--base dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-pen-to-square text--info"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="donation-details.html"><i class="fa-regular fa-eye text--danger"></i> Details</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="S.N">08</td>
                                <td data-label="Title"><span class="text-overflow-1 text--base">Education for Every Child: Donate to Break the Cycle of Poverty</span></td>
                                <td data-label="Goal">$8,500.00</td>
                                <td data-label="Fund Raised">$12,500.00</td>
                                <td data-label="Deadline">
                                    <span>
                                        <span class="d-block">2023-01-30</span>
                                    </span>
                                </td>
                                <td data-label="Status"><span class="badge badge--secondary">Expired</span></td>
                                <td data-label="Action">
                                    <div class="custom--dropdown dropdown-sm">
                                        <button class="btn btn--sm btn-outline--base dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-pen-to-square text--info"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="donation-details.html"><i class="fa-regular fa-eye text--danger"></i> Details</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="S.N">09</td>
                                <td data-label="Title"><span class="text-overflow-1 text--base">Education for Every Child: Donate to Break the Cycle of Poverty</span></td>
                                <td data-label="Goal">$8,500.00</td>
                                <td data-label="Fund Raised">$12,500.00</td>
                                <td data-label="Deadline">
                                    <span>
                                        <span class="d-block">2023-01-30</span>
                                    </span>
                                </td>
                                <td data-label="Status"><span class="badge badge--info">Approved</span></td>
                                <td data-label="Action">
                                    <div class="custom--dropdown dropdown-sm">
                                        <button class="btn btn--sm btn-outline--base dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-pen-to-square text--info"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="donation-details.html"><i class="fa-regular fa-eye text--danger"></i> Details</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="S.N">10</td>
                                <td data-label="Title"><span class="text-overflow-1 text--base">Education for Every Child: Donate to Break the Cycle of Poverty</span></td>
                                <td data-label="Goal">$8,500.00</td>
                                <td data-label="Fund Raised">$12,500.00</td>
                                <td data-label="Deadline">
                                    <span>
                                        <span class="d-block">2023-01-30</span>
                                    </span>
                                </td>
                                <td data-label="Status"><span class="badge badge--info">Approved</span></td>
                                <td data-label="Action">
                                    <div class="custom--dropdown dropdown-sm">
                                        <button class="btn btn--sm btn-outline--base dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-pen-to-square text--info"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="donation-details.html"><i class="fa-regular fa-eye text--danger"></i> Details</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
