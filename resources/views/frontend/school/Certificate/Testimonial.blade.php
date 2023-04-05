            <html>
                <head>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
                        
        <style>
            body {
                /* font-family: Roboto; */
            }
            .certificate-container {
                /* padding: 50px; */
                width: 100%;
                /* margin-left: 150px; */
                /* background-image: url('/Certificate/testimonial.png');
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover; */
                border: 2px solid #b67b15;
                /* padding: 25px; */
                height: 100vh;
            }
            /* .certificate {
                border: 2px solid #b67b15;
                padding: 25px;
                height: 650px;
                position: relative;
            } */
            
            /* .certificate::before {
                content: '';
                top: 0px;
                left: 0px;
                bottom: 0px;
                right: 0px;
                position: absolute;
                background-image: url('/Certificate/testimonial.png');
                background-size: 100%;
                z-index: -1;
            } */
            .certificate-body {
                text-align: center;
            }
            
            h1 {
            
                font-weight: 400;
                font-size:55px;
                color: #b67b15;
            }
            
            .student-name {
                font-size: 30px;
            }
            
            .certificate-content {
                margin: 0 auto;
                width: 750px;
            }
            
            .about-certificate {
                width: 380px;
                margin: 0 auto;
            }
            
            .topic-description {
                font-family: 'Tiro Telugu', serif;
                font-size: 19px;
                font-style: italic;

                text-align: center;
            }
            .Certificate_title.p1 {
              font-family: "Times New Roman", Times, serif ;
            }
            .Certificate_header {
                font-family: 'Tiro Telugu', serif;
                margin-top: 90px;
                font-style: italic;
                font-size: 55px;
                font-weight: 800;
            }
                    </style>
                </head>
                <body >
                    <div class="certificate-container" style="background-image: url('{{ public_path("/Certificate/testimonial.png")}}');
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: cover;" >
                        <div class="certificate" id="printable-area">
                           
                            
                            <div class="certificate-body ">
                               
                                {{-- <h3 class="certificate-title mt-5"><strong> {{$school->school_name}}</strong></h3> --}}
                                <h1  class="Certificate_header ">Certificate of Testimonial</h1>
                                <p class="student-name">{{$school->school_name}}</p>
                                <div class="certificate-content">
                                    <div class="about-certificate">
                                        <p>
                                    has completed [hours] hours on topic title here online on Date [Date of Completion]
                                    </p>
                                    </div>
                                    <p class="topic-title">
                                        The Topic consists of [hours] Continuity hours and includes the following:
                                    </p>
                                    <div class="text-center">
                                        <p class="topic-description " >During {{$user->name}}'s time at {{$school->school_name}} ,they were enrolled in [grade/level].Their academic performance was excellent and their conduct and character were deemed exemplary by the school authorities We wish {{$user->name}} the very best in their future academic endeavors and personal growth. </p>
                                        <p>Issued on behalf of {{$school->school_name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </body>
            </html>
