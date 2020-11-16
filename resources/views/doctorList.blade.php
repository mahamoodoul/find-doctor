<section class="ftco-section bg-light">
    <div class="container-fluid px-5">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <h2 class="mb-4">Our Qualified Doctors</h2>
            </div>
        </div>

        <div class="row">

            @foreach($doctorAllInfo as $doctorinfo)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="staff">
                    <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url(<?php echo $doctorinfo[0]->image  ?>);"> </div>
                    </div>

                    <div class="text text-center">

                        <h3 class="mb-2">{{$doctorinfo[0]->name}}</h3>
                        <span class="position mb-2">{{$doctorinfo[0]->category}}</span>
                        <div class="faded">


                            <h3 class="mb-2">{{$doctorinfo[0]->company_name}}</h3>
                            <h3 class="mb-2">{{$doctorinfo[0]->job_position}}</h3>
                            <input id="avg" type="hidden" value="{{$doctorinfo[0]->avg}}">



                            <div align="center" style="background: white; color:rgba(0,0,0,.18); padding-top: 3px; height: 39px; margin-bottom: 13px; border-radius: 3px;">
                                <?php
                                for ($i = 0; $i < $doctorinfo[0]->avg; $i++) {
                                ?>
                                    <i style="color: green;" class="fa fa-star fa-2x" data-index="0"></i>

                                <?php   }
                                $total_left = 5 - $doctorinfo[0]->avg;
                                for ($j = 0; $j < $total_left; $j++) {
                                ?>
                                    <i class="fa fa-star fa-2x" data-index="0"></i>
                                <?php    }
                                ?>
                                <br><br>
                            </div>

                            <input class="doctor_id" type="hidden" value="{{$doctorinfo[0]->doctor_id}}">
                            <a class="appointment takeAppointment" href="{{route('appointment.doctor', $doctorinfo[0]->doctor_id)}}">Take Appointment</a>
                            <!-- <button type="submit" id="" ></button> -->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>




<section class="ftco-facts img ftco-counter" style="background-image: url(images/bg_3.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 p-4">
                    <div class="text">
                        <strong class="number" data-number="30">0</strong>
                        <span>Years of Experienced</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 p-4">
                    <div class="text">
                        <strong class="number" data-number="4500">0</strong>
                        <span>Happy Patients</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 p-4">
                    <div class="text">
                        <strong class="number" data-number="84">0</strong>
                        <span>Number of Doctors</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 p-4">
                    <div class="text">
                        <strong class="number" data-number="300">0</strong>
                        <span>Number of Staffs</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>