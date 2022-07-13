<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>

        @page {
            margin: 0cm 0cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: -1cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /** Extra personal styles **/
            /* background-color: #03a9f4; */
            color: rgb(10, 3, 3);
            text-align: center;
            line-height: 1.5cm;
        }

        hr{
            margin: 0;
            padding: 0;
            background-color: gray;
            height: 2px;
            border: none;
            margin-bottom:-.8rem;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /** Extra personal styles **/
            /* background-color: #03a9f4; */
            color: rgb(24, 9, 9);
            text-align: center;
            line-height: 1.5cm;
        }
    </style>

</head>

<body>

    <header>
        <h2 style="text-align: center;">{{ $manuscript->journalName }} - Submission Proof</h2>
    </header>

    <footer>
        <hr>
        <h2 style="text-align: center; ">{{ $manuscript->journalName }} - Submitted Manuscript</h2>
    </footer>

    <div class="container pt-4">
        {{-- {{ asset('storage/journals/bannerImage/'.  $manuscript->journalBanner) }} --}}
        <img src="{{ asset('storage/journals/bannerImage/'.  $manuscript->journalBanner) }}">
        <h3 style="text-align: center">{{ $manuscript->manuscriptTitle }}</h3>
        <div style="text-align: center; ">
          {!! $manuscript->manuscriptAbstract !!}
       </div>
        <table style=" border-collapse:collapse; #ddd; width:100%; margin:auto padding:2rem;">
            <tr style="border: 1px solid black; padding:1rem;">
                <th style="background-color: rgb(219, 219, 219);  padding:.5rem; text-align:left;">Journal</th>
                <td style="padding:.5rem;">{{ $manuscript->journalName }}</td>
            </tr>
            <tr style="border: 1px solid black; padding:1rem; ">
                <th style="background-color: rgb(219, 219, 219); padding:.5rem;  text-align:left;">Manuscript ID</th>
                <td style="padding:.5rem;">{{ $manuscript->orderNumber }}</td>
            </tr>
            <tr style="border: 1px solid black; padding:1rem;">
                <th style="background-color: rgb(219, 219, 219);  padding:.5rem;  text-align:left;">Manuscript Type</th>
                <td style="padding:.5rem;">{{ $manuscript->typeOfManuscript }}</td>
            </tr>
            <tr style="border: 1px solid black; padding:1rem;">
                <th style="background-color: rgb(219, 219, 219);  padding:.5rem;  text-align:left;">Area of Interest
                </th>
                <td style="padding:.5rem;">{{ $manuscript->areaOfSpecificInterest }}</td>
            </tr>
            <tr style="border: 1px solid black; padding:1rem;">
                <th style="background-color: rgb(219, 219, 219); padding:.5rem;  text-align:left;">Date Submitted by the
                    Author</th>
                <td style="padding:.5rem;">{!! date('D, d M Y', strtotime($manuscript->submitted_at)) !!} </td>
            </tr>
            <tr style="border: 1px solid black; padding:1rem; ">
                <th style="background-color: rgb(219, 219, 219); padding:.5rem;  text-align:left;">Complete List of
                    Authors:</th>
                <td style="padding:.5rem;">
                    <ul>
                        @foreach ($authInstitutions as $authInstitution)
                            <li>{{ $authInstitution->authTitle . ' ' . $authInstitution->authFirstName . ' ' . $authInstitution->authLastName }}
                                {{ $authInstitution->authAffiliation }} {{ $authInstitution->authCountry }} </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </table>
    </div>
</body>


</html>
