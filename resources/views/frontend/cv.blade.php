<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $cv->full_name }} - CV Builder</title>
    <link rel="shortcut icon" href="{{ asset('frontend/img/favicon.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('frontend/css/cv.css') }}">
    <script src="{{ asset('frontend/js/cv.js') }}" defer></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
</head>

<div class="loader-back">
    <div class="loader"></div>
</div>

<div class="container-fluid">
    <div class="contact-title" align="center">
        <p align="center" class="cv-title">RESUME OF</p>
        <img src="{{ url('/'). $cv->photo_path }}" alt="{{ $cv->photo_name }}" class="photo">
        <h1 class="full_name-title">
            {{ $cv->full_name }}
        </h1>
        <p>Mailing address :
            {{ $cv->mailing_adddress }}
        </p>
        <p>Email:
            {{ $cv->email }}
        </p>
        <p>Mobile:
            {{ $cv->mobile }}
        </p>
    </div>
    <div class="personal">
        <hr>
        <h4 class="sub-title">Personal Details</h4>
        <hr>
        <table class="personal-table">
            <tr>
                <td>Father's Name</td>
                <td>:</td>
                <td>
                    {{ $cv->fathers_name }}
                </td>
            </tr>

            <tr>
                <td>Mother's Name</td>
                <td>:</td>
                <td>
                    {{ $cv->mothers_name }}
                </td>
            </tr>

            <tr>
                <td>Date of Birth</td>
                <td>:</td>
                <td>
                    {{ $cv->date_of_birth }}
                </td>
            </tr>

            <tr>
                <td>Nationality</td>
                <td>:</td>
                <td>
                    {{ $cv->nationality }}
                </td>
            </tr>

            <tr>
                <td>Religion</td>
                <td>:</td>
                <td>
                    {{ $cv->religion }}
                </td>
            </tr>

            <tr>
                <td>Marital Status</td>
                <td>:</td>
                <td>
                    {{ $cv->marital_status }}
                </td>
            </tr>

            <tr>
                <td>Present Adddress</td>
                <td>:</td>
                <td>
                    {{ $cv->present_adddress }}
                </td>
            </tr>

            <tr>
                <td>Permanent Adddress &MediumSpace;</td>
                <td>: &MediumSpace;</td>
                <td>
                    {{ $cv->permanent_adddress }}
                </td>
            </tr>

            <tr>
                <td>Mailing Adddress</td>
                <td>:</td>
                <td>
                    {{ $cv->mailing_adddress }}
                </td>
            </tr>

        </table>
    </div>

    <div class="career">
        <hr>
        <h4 class="sub-title">Objective of Career</h4>
        <hr>
        <p>
            {{ $cv->objective }}
        </p>
    </div>

    <div class="education_qualifications">
        <hr>
        <h4 class="sub-title">Education Qualifications</h4>
        <hr>
        <table>
            <thead>

                <tr>
                    <th>Name of Exam</th>
                    <th>Year of passing</th>
                    <th>Group / Technology</th>
                    <th>Board</th>
                    <th>Result</th>
                </tr>
            </thead>
            <tbody>

                @if (!empty($cv->ssc_year))
                <tr>
                    <td>SSC</td>
                    <td>
                        {{ $cv->ssc_year }}
                    </td>
                    <td>
                        {{ $cv->ssc_group }}
                    </td>
                    <td>
                        {{ $cv->ssc_board }}
                    </td>
                    <td>
                        {{ $cv->ssc_result }}
                    </td>
                </tr>
                @endif

                @if (!empty($cv->hsc_year))
                <tr>
                    <td>HSC</td>
                    <td>
                        {{ $cv->hsc_year }}
                    </td>
                    <td>
                        {{ $cv->hsc_group }}
                    </td>
                    <td>
                        {{ $cv->hsc_board }}
                    </td>
                    <td>
                        {{ $cv->hsc_result }}
                    </td>
                </tr>
                @endif

                @if (!empty($cv->diploma_year))
                <tr>
                    <td>Diploma</td>
                    <td>
                        {{ $cv->diploma_year }}
                    </td>
                    <td>
                        {{ $cv->diploma_group }}
                    </td>
                    <td>
                        {{ $cv->diploma_board }}
                    </td>
                    <td>
                        {{ $cv->diploma_result }}
                    </td>
                </tr>
                @endif

                @if (!empty($cv->bsc_year))
                <tr>
                    <td>BSc</td>
                    <td>
                        {{ $cv->bsc_year }}
                    </td>
                    <td>
                        {{ $cv->bsc_group }}
                    </td>
                    <td>
                        {{ $cv->bsc_board }}
                    </td>
                    <td>
                        {{ $cv->bsc_result }}
                    </td>
                </tr>
                @endif

                @if (!empty($cv->msc_year))
                <tr>
                    <td>MSc</td>
                    <td>
                        {{ $cv->msc_year }}
                    </td>
                    <td>
                        {{ $cv->msc_group }}
                    </td>
                    <td>
                        {{ $cv->msc_board }}
                    </td>
                    <td>
                        {{ $cv->msc_result }}
                    </td>
                </tr>
                @endif

            </tbody>
        </table>
    </div>

    @if (!empty($cv->experience))
    <div class="experience">
        <hr>
        <h4 class="sub-title">Experience</h4>
        <hr>
        <p>
        <pre>{{ $cv->experience }}</pre>
        </p>
    </div>
    @endif

    @if (!empty($cv->references))
    <div class="references">
        <hr>
        <h4 class="sub-title">References</h4>
        <hr>
        <p>
        <pre>{{ $cv->references }}</pre>
        </p>
    </div>
    @endif

    <div align="center" class="hidden bg-info bg-opacity-25 border border-success rounded p-3 mb-5">
        <h6 class="text-dark">
            <strong>You can access this cv from anytime, anywhere. You can also share this CV with any one. Just share this link</strong>
            <button class="btn btn-primary btn-sm" id="copy" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy CV Link">Copy</button>
        </h6>
        <button class="btn btn-primary w-25 m-2" id="print">Print</button>
    </div>
</div>


</body>

</html>