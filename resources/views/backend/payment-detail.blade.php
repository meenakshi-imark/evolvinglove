@include('layouts.dashboard.header')

<main class="content">
    <section class="main-content">
        <div class="title-head">
            <h1>Payment For {{ucfirst($payment_byid->first_name)}}</h1>
        </div>
        <div class="white-box">
            <div class="paymentDetail-content">
                <h5>Basic Info</h5>
                <ul class="row row-cols-2 row-cols-md-5">
                    <li class="col">
                        <strong>First Name</strong>
                        <span>{{ucfirst($payment_byid->first_name)}}</span>
                    </li>
                    <li class="col">
                        <strong>Last Name</strong>
                        <span>{{ucfirst($payment_byid->last_name)}}</span>
                    </li>
                    <li class="col">
                        <strong>Email</strong>
                        <span>{{$payment_byid->email}}</span>
                    </li>
                    <li class="col">
                        <strong>Cell Number</strong>
                        <span>{{ucfirst($payment_byid->number)}}</span>
                    </li>
                    <li class="col">
                        <strong>Billing City</strong>
                        <span>{{ucfirst($payment_byid->billing_city)}}</span>
                    </li>
                    <li class="col">
                        <strong>Billing Country</strong>
                        <span>{{ucfirst($payment_byid->billing_country)}}</span>
                    </li>
                    <li class="col">
                        <strong>Billing Zip</strong>
                        <span>{{ucfirst($payment_byid->billing_zip)}}</span>
                    </li>
                    <li class="col">
                        <strong>Date</strong>
                        <span>{{date('d - M - Y',strtotime($payment_byid->created_at));}}</span>
                    </li>
                </ul>

                <hr class="divider">

                <h5>Shopping Cart</h5>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>QTY</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Full 40 Page Relationship Archetype Report + Step By Step Guide</td>
                                <td>01</td>
                                <td>$99.00</td>
                                <td>$99.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>

@include('layouts.dashboard.footer')