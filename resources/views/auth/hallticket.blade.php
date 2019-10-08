@extends('site.app')
@section('content')
@section('name','Examination : Hall Ticket')
    <section class="container">
        <div class="row">
            <div class="col-md-8">
                <p>INDEX NO: ANU15260135 </p>
                <p>NAME: JOHN KWAME AMOAH </p>
                <p>COURSE: BSC. COMPUTER ENGINEERING </p>
                <p>DEPARTMENT: COMUTER SCIENCE & ENGINEERING (FULLTIME) </p>
                <p>HALL TICKET NO.: 123456789 </p>
            </div>
            <div class="col-md-4">
                <img src="img/avatar.png" class="d-block img-fluid mb-3" width="240px" alt="avatar">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">THEORY SUBJECT</h4>
                    </div>
                    <table class="table table-striped">

                        <thead class="thead-light">
                            <tr>
                                <th>Course Code</th>
                                <th>Subject Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Invigilators Signature</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">BUS433</td>
                                <td>ENGINEERING ECONOMICS</td>
                                <td>21/07/2018</td>
                                <td>1:00PM - 4:00PM</td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td scope="row">BUS433</td>
                                <td>ENGINEERING ECONOMICS</td>
                                <td>21/07/2018</td>
                                <td>1:00PM - 4:00PM</td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td scope="row">BUS433</td>
                                <td>ENGINEERING ECONOMICS</td>
                                <td>21/07/2018</td>
                                <td>1:00PM - 4:00PM</td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td scope="row">BUS433</td>
                                <td>ENGINEERING ECONOMICS</td>
                                <td>21/07/2018</td>
                                <td>1:00PM - 4:00PM</td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td scope="row">BUS433</td>
                                <td>ENGINEERING ECONOMICS</td>
                                <td>21/07/2018</td>
                                <td>1:00PM - 4:00PM</td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td scope="row">BUS433</td>
                                <td>ENGINEERING ECONOMICS</td>
                                <td>21/07/2018</td>
                                <td>1:00PM - 4:00PM</td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td scope="row">BUS433</td>
                                <td>ENGINEERING ECONOMICS</td>
                                <td>21/07/2018</td>
                                <td>1:00PM - 4:00PM</td>
                                <td> </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt-5 signature">
            <div class="col-6 mt-5">
                <p class="pt-3 font-weight-bold">STUDENT'S SIGNATURE</p>
            </div>
            <div class="col-6 mt-5">
                <div class="row">

                <div class="offset-6 col-6">
                    <p class="pt-3 text-center font-weight-bold">STUDENT VERIFICATION</p>
                    <img src="img/qr_code.png" width="250" alt="qr code">
                </div>
                </div>
            </div>
        </div>
    </section>

@endsection