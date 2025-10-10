@extends('layouts.app')
@section('content')

    <!-- Search Card Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">
                    <div class="search-card p-4 p-lg-5 mx-auto">
                        <form>
                            <div class="row g-3 align-items-end">
                                <!-- Departure City -->
                                <div class="col-12 col-lg-3">
                                    <label for="from-city" class="form-label small text-muted">From</label>
                                    <div class="input-with-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="input-icon" aria-hidden="true">
                                            <path
                                                d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                                            </path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        <input id="from-city" type="text" class="form-control" placeholder="Departure city"
                                            aria-label="Departure city" required>
                                    </div>
                                </div>
                                <!-- Destination City -->
                                <div class="col-12 col-lg-3">
                                    <label for="to-city" class="form-label small text-muted">To</label>
                                    <div class="input-with-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="input-icon" aria-hidden="true">
                                            <path
                                                d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                                            </path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>
                                        <input id="to-city" type="text" class="form-control" placeholder="Destination city"
                                            aria-label="Destination city" required>
                                    </div>
                                </div>
                                <!-- Travel Date -->
                                <div class="col-12 col-lg-3">
                                    <label for="travel-date" class="form-label small text-muted">Travel Date</label>
                                    <div class="input-with-icon">
                                        <!-- SVG icon instead of <i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="input-icon" aria-hidden="true">
                                            <path d="M8 2v4"></path>
                                            <path d="M16 2v4"></path>
                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                            <path d="M3 10h18"></path>
                                        </svg>
                                        <input id="travel-date" type="date" class="form-control" placeholder="mm/dd/yyyy"
                                            aria-label="Travel date" required>
                                    </div>
                                </div>
                                <!-- Passengers -->
                                <div class="col-12 col-lg-3">
                                    <label for="passengers" class="form-label small text-muted">Passengers</label>
                                    <div class="input-with-icon">
                                        <!-- SVG icon instead of <i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="input-icon" aria-hidden="true">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                            <path d="M16 3.128a4 4 0 0 1 0 7.744"></path>
                                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                        </svg>
                                        <select id="passengers" class="form-select" aria-label="Passengers" required>
                                            <option value="1" selected>1 Passenger</option>
                                            <option value="2">2 Passengers</option>
                                            <option value="3">3 Passengers</option>
                                            <option value="4">4 Passengers</option>
                                            <option value="5">5 Passengers</option>
                                            <option value="6">6 Passengers</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Search Button -->
                            <div class="row mt-4">
                                <div class="col-12 col-lg-4">
                                    <button type="submit" class="btn btn-search btn-lg w-100 w-md-auto">
                                        <i class="bi bi-search me-2" aria-hidden="true"></i>
                                        <span class="fw-semibold">Search Buses</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Routes Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5" style="font-size:2.5rem;">Popular Routes</h2>
            <div class="row g-4 justify-content-center">
                <!-- Route Card 1 -->
                <div class="col-12 col-lg-3">
                    <div class="route-card p-4 h-100 rounded-3 border bg-white">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <div class="fw-semibold" style="font-size:1.15rem;">Mumbai</div>
                                <div class="text-muted small">to</div>
                                <div class="fw-semibold" style="font-size:1.15rem;">Pune</div>
                            </div>
                            <div class="text-end">
                                <div class="text-muted small">Starting from</div>
                                <div class="fw-bold text-purple" style="font-size:1.2rem;">₹299</div>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary w-100">View Buses</button>
                    </div>
                </div>
                <!-- Route Card 2 -->
                <div class="col-12 col-lg-3">
                    <div class="route-card p-4 h-100 rounded-3 border bg-white">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <div class="fw-semibold" style="font-size:1.15rem;">Delhi</div>
                                <div class="text-muted small">to</div>
                                <div class="fw-semibold" style="font-size:1.15rem;">Jaipur</div>
                            </div>
                            <div class="text-end">
                                <div class="text-muted small">Starting from</div>
                                <div class="fw-bold text-purple" style="font-size:1.2rem;">₹399</div>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary w-100">View Buses</button>
                    </div>
                </div>
                <!-- Route Card 3 -->
                <div class="col-12 col-lg-3">
                    <div class="route-card p-4 h-100 rounded-3 border bg-white">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <div class="fw-semibold" style="font-size:1.15rem;">Bangalore</div>
                                <div class="text-muted small">to</div>
                                <div class="fw-semibold" style="font-size:1.15rem;">Chennai</div>
                            </div>
                            <div class="text-end">
                                <div class="text-muted small">Starting from</div>
                                <div class="fw-bold text-purple" style="font-size:1.2rem;">₹449</div>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary w-100">View Buses</button>
                    </div>
                </div>
                <!-- Route Card 4 -->
                <div class="col-12 col-lg-3">
                    <div class="route-card p-4 h-100 rounded-3 border bg-white">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <div class="fw-semibold" style="font-size:1.15rem;">Hyderabad</div>
                                <div class="text-muted small">to</div>
                                <div class="fw-semibold" style="font-size:1.15rem;">Vijayawada</div>
                            </div>
                            <div class="text-end">
                                <div class="text-muted small">Starting from</div>
                                <div class="fw-bold text-purple" style="font-size:1.2rem;">₹249</div>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary w-100">View Buses</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection