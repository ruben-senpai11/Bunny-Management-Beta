@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="card-header d-flex align-items-center bg-success">
                <h2 class="fs-5 fw-bold mb-0">General information</h2>
                <div class="ms-auto"><a class="fw-normal d-inline-flex align-items-center" href="#"><svg class="icon icon-xxs me-2"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            <path fill-rule="evenodd"
                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                clip-rule="evenodd"></path>
                        </svg> View all</a></div>
            </div>
            <div class="card card-body border-0 shadow mb-4">
                
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div><label for="first_name">First Name</label> <input class="form-control" id="first_name"
                                    type="text" placeholder="Enter your first name" required=""></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div><label for="last_name">Last Name</label> <input class="form-control" id="last_name"
                                    type="text" placeholder="Also your last name" required=""></div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3"><label for="birthday">Birthday</label>
                            <div class="input-group"><span class="input-group-text"><svg class="icon icon-xs"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg> </span><input data-datepicker="" class="form-control datepicker-input"
                                    id="birthday" type="text" placeholder="dd/mm/yyyy" required=""></div>
                        </div>
                        <div class="col-md-6 mb-3"><label for="gender">Gender</label> <select class="form-select mb-0"
                                id="gender" aria-label="Gender select example">
                                <option selected="selected">Gender</option>
                                <option value="1">Female</option>
                                <option value="2">Male</option>
                            </select></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group"><label for="email">Email</label> <input class="form-control" id="email"
                                    type="email" placeholder="name@company.com" required=""></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group"><label for="phone">Phone</label> <input class="form-control" id="phone"
                                    type="number" placeholder="+12-345 678 910" required=""></div>
                        </div>
                    </div>
                    <h2 class="h5 my-4">Location</h2>
                    <div class="row">
                        <div class="col-sm-9 mb-3">
                            <div class="form-group"><label for="address">Address</label> <input class="form-control"
                                    id="address" type="text" placeholder="Enter your home address" required=""></div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="form-group"><label for="number">Number</label> <input class="form-control"
                                    id="number" type="number" placeholder="No." required=""></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 mb-3">
                            <div class="form-group"><label for="city">City</label> <input class="form-control" id="city"
                                    type="text" placeholder="City" required=""></div>
                        </div>
                        <div class="col-sm-4 mb-3"><label for="state">State</label> <select class="form-select w-100 mb-0"
                                id="state" name="state" aria-label="State select example">
                                <option selected="selected">State</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District Of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select></div>
                        <div class="col-sm-4">
                            <div class="form-group"><label for="zip">ZIP</label> <input class="form-control" id="zip"
                                    type="tel" placeholder="ZIP" required=""></div>
                        </div>
                    </div>
                    <div class="mt-3"><button type="submit" class="btn btn-dark">Save All</button></div>
                </form>
            </div>
        
        </div>
        <div class="col-12 col-xl-4">
            <div class="row">
               
                <div class="col-12 mb-4">
                    <div class="card notification-card border-0 shadow">
                        <div class="card-header d-flex align-items-center bg-light ">
                            <h2 class="fs-5 fw-bold mb-0">Aide </h2>
                            <div class="ms-auto"><a class="fw-bold d-inline-flex align-items-center" href="#">?</a></div>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush list-group-timeline">
                                <div class="list-group-item border-0">
                                    <div class="row ps-lg-1">
                                        <div class="col-auto">
                                            <div class="icon-shape icon-xs icon-shape-purple rounded"><svg fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                                    </path>
                                                </svg></div>
                                        </div>
                                        <div class="col ms-n2 mb-3">
                                            <h3 class="fs-6 fw-bold mb-1">You sold an item</h3>
                                            <p class="mb-1">Bonnie Green just purchased "Volt - Admin Dashboard"!</p>
                                            <div class="d-flex align-items-center"><svg class="icon icon-xxs text-gray-400 me-1"
                                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                        clip-rule="evenodd"></path>
                                                </svg> <span class="small">1 minute ago</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item border-0">
                                    <div class="row ps-lg-1">
                                        <div class="col-auto">
                                            <div class="icon-shape icon-xs icon-shape-primary rounded"><svg fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z"
                                                        clip-rule="evenodd"></path>
                                                </svg></div>
                                        </div>
                                        <div class="col ms-n2 mb-3">
                                            <h3 class="fs-6 fw-bold mb-1">New message</h3>
                                            <p class="mb-1">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                            <div class="d-flex align-items-center"><svg class="icon icon-xxs text-gray-400 me-1"
                                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                        clip-rule="evenodd"></path>
                                                </svg> <span class="small">8 minutes ago</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item border-0">
                                    <div class="row ps-lg-1">
                                        <div class="col-auto">
                                            <div class="icon-shape icon-xs icon-shape-warning rounded"><svg fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg></div>
                                        </div>
                                        <div class="col ms-n2 mb-3">
                                            <h3 class="fs-6 fw-bold mb-1">Product issue</h3>
                                            <p class="mb-0">A new issue has been reported for Pixel Pro.</p>
                                            <div class="d-flex align-items-center"><svg class="icon icon-xxs text-gray-400 me-1"
                                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                        clip-rule="evenodd"></path>
                                                </svg> <span class="small">10 minutes ago</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item border-0">
                                    <div class="row ps-lg-1">
                                        <div class="col-auto">
                                            <div class="icon-shape icon-xs icon-shape-success rounded"><svg fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                                                        clip-rule="evenodd"></path>
                                                </svg></div>
                                        </div>
                                        <div class="col ms-n2 mb-3">
                                            <h3 class="fs-6 fw-bold mb-1">Product update</h3>
                                            <p class="mb-0">Spaces - Listings Template has been updated</p>
                                            <div class="d-flex align-items-center"><svg class="icon icon-xxs text-gray-400 me-1"
                                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                        clip-rule="evenodd"></path>
                                                </svg> <span class="small">4 hours ago</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item border-0">
                                    <div class="row ps-lg-1">
                                        <div class="col-auto">
                                            <div class="icon-shape icon-xs icon-shape-success rounded"><svg fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                                                        clip-rule="evenodd"></path>
                                                </svg></div>
                                        </div>
                                        <div class="col ms-n2">
                                            <h3 class="fs-6 fw-bold mb-1">Product update</h3>
                                            <p class="mb-0">Volt - Admin Dashboard has been updated</p>
                                            <div class="d-flex align-items-center"><svg class="icon icon-xxs text-gray-400 me-1"
                                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                        clip-rule="evenodd"></path>
                                                </svg> <span class="small">8 hours ago</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
            
            </div>
        </div>
    </div>
@endsection