@extends('layouts.list')
@section('title', 'Editor Panel')
@section('content')

    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Inner Page</li>
            </ol>
            <h2>Inner Page</h2>

        </div>
    </section>


    <div class="container">


        <h3>Welcome to Manuscript Handler - Editor's Panel</h3>

        <p>Each Editor-In-Chief is informed by an email when a new manuscript is submitted to his/her journal. The
            manuscript is quality checked by the Editorial Office and sent to "Editor's Panel" which can be seen in the
            "Awaiting Reviewer Selection" tab under "Editor Assignments". Clicking on "Awaiting Reviewer Selection" will
            list all manuscripts at the bottom. You can assess the credibility of the author by searching it in PubMed (by
            clicking on the icon) or look up the title. Once you are ready to process (read and send for review) the
            manuscript, you can click on "edit icon" under "Actions" to perform any of the following functions:</p>
        <ol>
            <li>Manuscript Details: View the combine single PDF or all author's submitted original files. You can also view
                the plagiarism report and any comments that are posted by the Editorial Office under "Originality Report and
                Comments".</li>
            <li>Associate Editors: You can assign associate editors who can handle this manuscirpt. He/She will be invited
                by email and will have all functionality as that of the Editor's Panel (this panel).</li>
            <li>Assign Reviewers: To assign reviewers, you need to add reviewers into "Selected Reviewers List" by one of
                the four options: a) check the reviewers from either preferred (pref) or non preferred (non pref) and click
                on "Add to reviewers list". b) you can create the reviewers by filling the information in "Create Reviewer
                Account" and finishing with Add. c) you can also add reviewers from the Editorial Board Members, choose the
                name and click on “Add to Reviewers List”. d) you can also add reviewers from Reviewer's Database using
                different search criteria. Finally, to invite reviewers select the reviewers from the “Selected Reviewers
                List”, set a deadline for reviewers to return the report and click "Invite". You can click on the
                "Dashboard" in the right top corner of any page to come back to home page of Editor's Panel or click “Home”
                to come back to home page of the users.</li>
        </ol>

        <p>Blue manuscript ID means that the article has passed 45 days post-submission and thus urgent actions are needed.
            The red manuscript ID means that the deadline given to Reviewer is passed so additional reviewers invitations
            are required. In cases of both (45 days post submission and reviewer's deadline expired), the manuscript ID
            would remain red.</p>


        <div class="row">
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="3">Manuscript Details</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3">Level of knowledge, attitude and practice toward organic fertilizer adoption
                                among almond smallholder farmers in Uruzgan, Afghanistan</td>
                        </tr>

                        <tr>
                            <td>
                               <a href=""><img src="https://www.manuscripthandler.com/images/PDF.png" width="24"> Download full manuscript</a>
                            </td>
                            <td><a href="">Download original files</a></td>
                            <td><a href="">Originality Reports and comments</a></td>
                        </tr>
                    </tbody>
                </table>
                {{-- <p>&nbsp;</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="4">Manuscript History (Earlier versions of the manuscript along with comments
                                and decision)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="23%"><strong></strong></td>
                            <td width="21%">
                                <a href="#" target="_blank"><img
                                        src="https://www.manuscripthandler.com/images/PDF.png" width="24"> Download</a>
                            </td>
                            <td width="24%"><a href="#">Reviewer’s Report</a></td>
                            <td width="32%"><a href="#">Editor Decision</a></td>
                        </tr>
                    </tbody>
                </table> --}}
                <p>&nbsp;</p>
                <form action="" method="post" name="submitManuscriptFRM" id="submitManuscriptFRM">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td colspan="4"> Reviewers Interested to Review a Revision of this Manuscript</td>
                            </tr>
                             
                                <tr>
                                    <th width="5%">S.no </th>
                                    <th width="40%">Reviewer Name</th>
                                    <th width="45%">Reviewer E-mail Address</th>
                                    <th width="10%">Action</th>
                                </tr>
                           
                            <tr>
                                <td colspan="4">No records found!</td>
                            </tr>
                        </tbody>
                    </table>
                </form>

                <p>&nbsp;</p>

                <form action="" method="post" name="submitManuscriptFRM" id="submitManuscriptFRM">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td colspan="4" class="associate_editor">Associate Editors <span
                                        style="float:right; padding-right:15px;"><a href="javascript:"
                                            class="assocEditor">Expand</a></span></td>
                            </tr>
                        </tbody>
                        <tbody class="assocEditorContent" style="display: none;">
                            <tr>
                                <th width="4%" height="30">S.no </th>
                                <th width="41%">Name </th>
                                <th width="44%">E-mail</th>
                                <th width="11%">Action</th>
                            </tr>
                            <tr>
                                <td height="30">1.</td>
                                <td>Zahid Hussain </td>
                                <td>zhussainws@aup.edu.pk</td>
                                <td>
                                    <input type="radio" name="addAssEd" id="addAssEd"
                                        value="50922,zhussainws@aup.edu.pk,Zahid Hussain">
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4">
                                    <input type="hidden" name="action" value="sendtoassedi">
                                    <input type="submit" class="btn btn-sm btn-primary" value="Send to associate editor"
                                        name="addrevSubmit">
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </form>


                <p>&nbsp;</p>

                <form action="{{ route('add-reviewers-selected-list', $orderNumber) }}" method="post" name="submitManuscriptFRM" id="submitManuscriptFRM">
                    @csrf

                    <input type="hidden" name="journalID" value="{{ $journal->id }}">
                    <input type="hidden" name="companyID" value="{{ $company->id }}">
                    

                    <table width="100%" class="table table-bordered">
                        <thead>

                            <tr>
                                <th colspan="7" class="pref_nonpre_revw"> Author's Preferred / Non-Preferred
                                    Reviewers</th>
                            </tr>

                            <tr>
                                <th width="5%" height="30" align="center">S.no </th>
                                <th width="16%">Name</th>
                                <th width="20%">E-mail</th>
                                <th width="26%">Fields of Expertise</th>
                                <th width="21%">Affiliation</th>
                                <th width="21%">Country</th>
                                <th width="12%" align="left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preferreds as $preferred)
                               
                                <tr>
                                    <td class="font12" height="30" align="center">{{ $preferred->id }}</td>
                                    <td class="font12">
                                        {{ $preferred->recommendingName }}<br>

                                        <br>

                                        <a style="height:15px; vertical-align:middle;"
                                            href="http://www.ncbi.nlm.nih.gov:80/entrez/query.fcgi?db=pubmed&amp;cmd=Search&amp;term=Suci P Syahlani"
                                            target="_blank"><img src="https://www.manuscripthandler.com/images/pubmed_logo.gif"
                                                height="15" border="0" width=""><br>Reviewer Search</a>

                                    </td>
                                    <td class="font-12">{{ $preferred->recommendingEmail }}</td>
                                    <td class="font-12">{{ $preferred->recommendingExperties }}</td>
                                    <td class="font-12">{{ $preferred->recommendingAffiliation }}</td>
                                    <td class="font-12">{{ $preferred->recommendingCountry }}</td>
                                    <td class="font-12" align="left">
                                        <input type="checkbox" name="addReviewers[]"
                                            id="addReviewers" value="{{ $preferred->id }},sugg">
                                        pref
                                        {{-- <input type="hidden" name="reviewerType[]" value="sugg"> --}}
                                        
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($nonpreferreds as $nonpreferred)
                               
                            <tr>
                                <td class="font12" height="30" align="center">{{ $nonpreferred->id }}</td>
                                <td class="font12">
                                    {{ $nonpreferred->recommendingName }}<br>

                                    <br>

                                    <a style="height:15px; vertical-align:middle;"
                                        href="http://www.ncbi.nlm.nih.gov:80/entrez/query.fcgi?db=pubmed&amp;cmd=Search&amp;term=Suci P Syahlani"
                                        target="_blank"><img src="https://www.manuscripthandler.com/images/pubmed_logo.gif"
                                            height="15" border="0" width=""><br>Reviewer Search</a>

                                </td>
                                <td class="font-12">{{ $nonpreferred->recommendingEmail }}</td>
                                <td class="font-12">{{ $nonpreferred->recommendingExpter }}</td>
                                <td class="font-12">{{ $nonpreferred->recommendingAffiliation }}</td>
                                <td class="font-12">{{ $nonpreferred->recommendingCountry }}</td>
                                <td class="font-12" align="left"><input type="checkbox" name="addReviewers[]"
                                        id="addReviewers" value="{{ $nonpreferred->id }},nonsugg">
                                    nonpref
                                    {{-- <input type="hidden" name="reviewerType[]" value="nonsugg"> --}}
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <td colspan="7" align="right">
                                    <input type="hidden" name="action" value="addRevlist">
                                    <input type="submit" class="button" value="Add to reviewers list"
                                        name="addrevSubmit">
                                </td>
                            </tr>



                        </tbody>
                    </table>
                </form>

                <p></p>

                <form action="" method="post" name="actionfRM" id="reviewersFRM">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="7" class="selected_reviewer_list">Selected Reviewer List</th>
                            </tr>

                            <tr class="greyHeading">
                                <th width="7%" height="30" align="center">S.no </th>
                                <th width="15%">Name</th>
                                <th width="10%">Status</th>
                                <th width="15%">Reviewer Response</th>
                                <th width="19%">Deadline</th>
                                <th width="28%">History</th>
                                <th width="6%">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td height="30" align="center" style="font-size:10px;">
                                    <input type="hidden" name="recordID[]" value="83887">
                                    <input type="checkbox" name="revwID[]" value="87220">1.
                                </td>
                                <td style="font-size:10px;">
                                    <!--<a href="javascript:"  style="font-size:10px;" onclick="popup_page('https://www.manuscripthandler.com/base/reminder.php?rid=87220&id=MH20220517170514-R1')">Osfar Sjofjan </a>-->

                                    <a href="javascript:">Osfar Sjofjan </a>

                                    <input type="hidden" name="hnames[]" value=" Osfar Sjofjan  ">
                                    <input type="hidden" name="hemailaddress[]" value="osfar@ub.ac.id">
                                    <input type="hidden" name="hdated[]" id="hdated" value="2022-07-18">
                                </td>
                                <td style="font-size:10px;">Invited</td>
                                <td style="font-size:10px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0"
                                        style="font-size:10px;">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" style="border:none; font-size:10px;">NULL</td>
                                            </tr>
                                            <tr>
                                                <td style="border:none;">
                                                    <select name="revwStatus[]" id="revwStatus1" style="width:100px;">
                                                        <option value="Waiting" selected="">Waiting</option>
                                                        <option value="Accepted">Accepted</option>
                                                        <option value="Rejected">Rejected</option>
                                                        <option value="Late Response">Late Response</option>
                                                        <option value="No Response">No Response</option>
                                                        <option value="Unavailable">Unavailable</option>
                                                        <option value="Auto-Declined (No Response)">Auto-Declined (No
                                                            Response)</option>
                                                    </select>
                                                </td>
                                                <td style="border:none;">
                                                    <a href="javascript:"
                                                        onclick="popup_page('https://www.manuscripthandler.com/base/revw_update_email.php?from=editor&amp;to=reviewer&amp;oid=MH20220517170514-R1&amp;recordid=83887&amp;eid=368&amp;rid=87220&amp;jid=18&amp;status=revwStatus1')"
                                                        style="font-size:10px;" class="btn-small">Save</a>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>



                                </td>
                                <td style="font-size:10px;">
                                    <a href="javascript:"
                                        onclick="return popup_page('https://www.manuscripthandler.com/base/editor_extension.php?id=83887&amp;ordNo=MH20220517170514-R1')"
                                        title="Request Extension"><img
                                            src="https://www.manuscripthandler.com/images/time_extension.png"
                                            width="16" border="0"></a>&nbsp;Extend Deadline <br>
                                    Mon, 18 Jul 2022 <br>
                                </td>
                                <td style="font-size:10px;">


                                    <strong>Invited:</strong>
                                    27 Jun 2022 <br>


                                    <strong>Due Date:</strong> 18 Jul 2022 <br>

                                    <strong>Time in Review:</strong>
                                    10 days
                                    <br>

                                    <strong>Last Reminder: </strong>02 Jul 2022 <br>



                                    <a href="javascript:"
                                        onclick="return popup_page('https://www.manuscripthandler.com/base/reviewers_reminders.php?id=83887')">Set
                                        Reminders</a>



                                </td>
                                <td class="font12" align="center">
                                    <a href="https://www.manuscripthandler.com/researcherslinks/Sarhad-Journal-of-Agriculture/awaiting-reviewer-selection-details/TUgyMDIyMDUxNzE3MDUxNC1SMQ==/del/ODM4ODc=/87220"
                                        title="Delete"
                                        onclick="return confirm('IMPORTANT NOTE: This will delete the reviewer\'s review as well, are you sure you want to delete this record?')"><img
                                            src="https://www.manuscripthandler.com/images/delete.png"></a>

                                </td>
                            </tr>




                            <tr class="greyBottBor" style="background-color:#eaf2d3">
                                <td height="30" align="center" style="font-size:10px;">
                                    <input type="hidden" name="recordID[]" value="83886">
                                    <input type="checkbox" name="revwID[]" value="87219">2.
                                </td>
                                <td style="font-size:10px;">
                                    <!--<a href="javascript:"  style="font-size:10px;" onclick="popup_page('https://www.manuscripthandler.com/base/reminder.php?rid=87219&id=MH20220517170514-R1')">Suci P Syahlani </a>-->

                                    <a href="javascript:"
                                        onclick="popup_page('https://www.manuscripthandler.com/base/revieweremail.php?from=editor&amp;to=reviewer&amp;oid=MH20220517170514-R1&amp;eid=368&amp;rid=87219&amp;jid=18')">Suci
                                        P Syahlani </a>




                                    <input type="hidden" name="hnames[]" value=" Suci P Syahlani  ">
                                    <input type="hidden" name="hemailaddress[]" value="suci.syahlani@ugm.ac.id">
                                    <input type="hidden" name="hdated[]" id="hdated" value="2022-07-18">
                                </td>
                                <td style="font-size:10px;">Invited</td>
                                <td style="font-size:10px;">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0"
                                        style="font-size:10px;">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" style="border:none; font-size:10px;">NULL</td>
                                            </tr>
                                            <tr>
                                                <td style="border:none;">
                                                    <select name="revwStatus[]" id="revwStatus2" style="width:100px;">
                                                        <option value="Waiting" selected="">Waiting</option>
                                                        <option value="Accepted">Accepted</option>
                                                        <option value="Rejected">Rejected</option>
                                                        <option value="Late Response">Late Response</option>
                                                        <option value="No Response">No Response</option>
                                                        <option value="Unavailable">Unavailable</option>
                                                        <option value="Auto-Declined (No Response)">Auto-Declined (No
                                                            Response)</option>
                                                    </select>
                                                </td>
                                                <td style="border:none;">
                                                    <a href="javascript:"
                                                        onclick="popup_page('https://www.manuscripthandler.com/base/revw_update_email.php?from=editor&amp;to=reviewer&amp;oid=MH20220517170514-R1&amp;recordid=83886&amp;eid=368&amp;rid=87219&amp;jid=18&amp;status=revwStatus2')"
                                                        style="font-size:10px;" class="btn-small">Save</a>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>



                                </td>
                                <td style="font-size:10px;">
                                    <a href="javascript:"
                                        onclick="return popup_page('https://www.manuscripthandler.com/base/editor_extension.php?id=83886&amp;ordNo=MH20220517170514-R1')"
                                        title="Request Extension"><img
                                            src="https://www.manuscripthandler.com/images/time_extension.png"
                                            width="16" border="0"></a>&nbsp;Extend Deadline <br>
                                    Mon, 18 Jul 2022 <br>
                                </td>
                                <td style="font-size:10px;">


                                    <strong>Invited:</strong>
                                    27 Jun 2022 <br>


                                    <strong>Due Date:</strong> 18 Jul 2022 <br>

                                    <strong>Time in Review:</strong>
                                    10 days
                                    <br>

                                    <strong>Last Reminder: </strong>02 Jul 2022 <br>



                                    <a href="javascript:"
                                        onclick="return popup_page('https://www.manuscripthandler.com/base/reviewers_reminders.php?id=83886')">Set
                                        Reminders</a>



                                </td>
                                <td class="font12" align="center">
                                    <a href="https://www.manuscripthandler.com/researcherslinks/Sarhad-Journal-of-Agriculture/awaiting-reviewer-selection-details/TUgyMDIyMDUxNzE3MDUxNC1SMQ==/del/ODM4ODY=/87219"
                                        title="Delete"
                                        onclick="return confirm('IMPORTANT NOTE: This will delete the reviewer\'s review as well, are you sure you want to delete this record?')"><img
                                            src="https://www.manuscripthandler.com/images/delete.png"></a>

                                </td>
                            </tr>



                            <tr>
                                <td align="right">&nbsp;</td>
                                <td colspan="6" align="left">
                                    <!--<input type="submit" class="button" value="Delete" name="deleted" />-->
                                    <input type="submit" class="button" value="Invite" name="saved">
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </form>

            </div>


            <div class="col-md-4">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th colspan="2">Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th># reviews required to make decision</th>
                            <td><input type="text" name="required_reviewers" id="required_reviewers"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <th># active selections</th>
                            <td>0</td>
                        </tr>
                        <tr>
                            <th># invited</th>
                            <td>0</td>
                        </tr>
                        <tr>
                            <th># agreed</th>
                            <td>0</td>
                        </tr>
                        <tr>
                            <th># declined</th>
                            <td>0</td>
                        </tr>
                        <tr>
                            <th># returned</th>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td><input type="hidden" name="action" value="addProgress"></td>
                            <td><input type="submit" value="Save" class="btn btn-sm btn-primary" name="btnProgress">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script>
        $(".assocEditor").click(function() {
            if ($(this).text() == 'Expand') {
                $('.assocEditorContent').show(500);
                $(this).text('Colapse');
            } else {
                $('.assocEditorContent').hide(500);
                $(this).text('Expand');
            }
        });
    </script>

@endsection
