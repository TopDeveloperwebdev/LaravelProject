<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Dashboard - {{ ucfirst(Request::segment(1)) }}</title>

    <!-- Fontfaces CSS-->
    <link href="/css/font-face.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="/vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/css/theme.css" rel="stylesheet" media="all">
    <link href="/css/main.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <style>
        .edit {
            width: 100%;
            height: 25px;
        }

        .editMode {
            border: 1px solid black;
        }

        .edit::before {
            content: '£';
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <!-- MENU SIDEBAR-->
        @if(auth()->user()->is_admin)
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="/">
                    <img src="/images/faraday-logo-white.png" alt="IXCRM" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <h4 class="name mb-2">{{ auth()->user()->name }}</h4>
                    <span class="badge badge-warning ">{{ auth()->user()->type }}</span>
                </div>
                <nav class="navbar-sidebar2">

                    @if(auth()->user()->is_admin && auth()->user()->admin_view )
                    <ul class="list-unstyled navbar__list font-weight-light">
                        <li>
                            <a href="/pending">
                                Pending Orders</a>
                        </li>
                        <li>
                            <a href="/processing">
                                Order Processing</a>
                        </li>
                        <li>
                            <a href="/history">
                                Order History</a>
                        </li>
                        <!-- <li>
                            <a href="/categories">
                              My Orders</a>
                        </li> -->
                        <li>
                            <a href="/reports">
                                Reports</a>
                        </li>
                        <li>
                            <a href="/department-accounts">
                                Accounting</a>
                        </li>
                        <li>
                            <a href="/partner/{{$partnerID}}">
                                Project Partners </a>
                        </li>
                        <li>
                            <a href="/accounts">
                                User Accounts</a>
                        </li>
                        <li>
                            <a href="/departments">
                                Departments</a>
                        </li>
                        {{-- <li>
                            <a href="/categories">
                              Assign Budgets</a>
                        </li> --}}
                        <li>
                            <a href="/notifications">
                                Notifications</a>
                        </li>

                    </ul>
                    @endif

                </nav>
            </div>
        </aside>
        @endif
        <div class="mb-5">
            <header class="">
                <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
                    <div class="d-flex justify-content-between">
                        @if(auth()->user()->partner == 1)
                        <img src="/images/The Faraday Institution ReLiB Logo No Strapline RGB-01.png" alt="IXCRM" width="200" />
                        @endif
                        <ul class="navbar-nav mr-auto">
                            @if(!auth()->user()->is_admin && !auth()->user()->admin_view )
                            <li class="nav-item ml-5">
                                <a class="nav-link disabled text-dark" href="#" tabindex="-1" aria-disabled="true">{{ auth()->user()->name }}</a>
                            </li>
                            @endif
                        </ul>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto ">
                            <li class="d-flex justify-content-around ml-15">
                                @if(auth()->user()->partner == 1)
                                <img src="images/{{ auth()->user()->partnerInfo->logo }}" width="200">
                                @endif
                            </li>
                        </ul>
                        <div class="header-button" onclick="event.preventDefault()
                                            $('#logout-form').submit();">
                            <div class="header-button-item mr-3">
                                <i class="zmdi zmdi-power"></i>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <div class="header-button2">

                            <div class="header-button-item mr-0 js-sidebar-btn">
                                <i class="zmdi zmdi-menu"></i>
                            </div>
                            <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="/my-account">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                    @if(auth()->user()->is_admin)
                                    <div class="account-dropdown__item">
                                        <a href="/security">
                                            <i class="zmdi zmdi-settings"></i>Security</a>
                                    </div>
                                    @if(auth()->user()->admin_view)
                                    <div class="account-dropdown__item">
                                        <a href="/requisitioner">
                                            <i class="zmdi zmdi-swap"></i>Switch to Requisitioner</a>
                                    </div>
                                    @else
                                    <div class="account-dropdown__item">
                                        <a href="/administrator">
                                            <i class="zmdi zmdi-swap"></i>Switch to Admin</a>
                                    </div>
                                    @endif
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
    </div>

    <div class="container-fluid" @if(auth()->user()->is_admin) style="margin-left: 200px;" @endif>
        <div class="col-md-12" style="margin-top: -20px;">
            @if(auth()->user()->partner == 1)
            <div class="row">
                <div class="col-md-5">
                    <b>Project Name</b>: {{ auth()->user()->project_name }}<br />
                    <b>Project Start Date</b>: {{ auth()->user()->partnerInfo->project_start_date }}<br />
                    <b>Project Number</b>: {{ auth()->user()->project_num }}<br />
                    <b>Grant Administered By</b>: {{ auth()->user()->partnerInfo->grant_administered_by }}
                </div>

                <div class="col-md-6">
                    <b>Organisation Name</b>: {{ auth()->user()->partnerInfo->organisation_name }}<br>
                    <b>Organisation Type</b>: {{ auth()->user()->partnerInfo->organisation_type }}<br />
                    <b>Organisation Size</b>: {{ auth()->user()->partnerInfo->organisation_size }}<br>
                    <b>Project Role</b>: {{ auth()->user()->partnerInfo->project_role }}
                </div>
            </div>
            <hr />
            @endif
        </div>

        <form>

            @if(auth()->user()->is_admin && ! auth()->user()->partner == 1)
            <div class="row">
                <div class="col-md-6" style="margin-top: -20px;">

                    <select name="partner" id='partner' class="form-control" selected="{{$partnerID}}">
                        @foreach ($partners as $partner)
                        @if($partner->user_id== $partnerID)
                        <option value="{{ $partner->user_id}}" selected>{{ $partner->organisation_name }}</option>
                        @else
                        <option value="{{ $partner->user_id}}">{{ $partner->organisation_name }}</option>
                        @endif
                        @endforeach
                    </select>

                </div>
                @endif
            </div>

            <div class="row  ml-1 p-2" style="overflow-x: scroll;">
                {{-- <div class="table-responsive"> --}}
                <table class="table table-striped partner-table">
                    <thead>
                        <tr class="">
                            <th colspan="8"></th>
                            @foreach($dateArray as $date)
                            <th class="table-info text-center text-sm">{{ $date->header }}</th>
                            @endforeach
                        </tr>
                        <tr>
                            <th colspan="8"></th>
                            @foreach($dateArray as $date)
                            <th class="text-center">{{ $date->Qn }}</th>
                            @endforeach
                        </tr>
                        <tr class="table-info" style="border-bottom: 3px solid #565656;">
                            <th colspan="2">Cost Item</th>
                            <th colspan="5">Description</th>
                            <th>Total Budget</th>
                            @foreach($dateArray as $date)
                            <th class="text-center">{{ $date->isCurrent }}</th>
                            @endforeach
                            <th>PROJECT TOTAL</th>
                            <th>VARIANCE</th>
                            <th>YR1 Budget</th>
                            <th>YEAR 1</th>
                            <th>VARIANCE</th>
                            <th>YR2 Budget</th>
                            <th>YEAR 2</th>
                            <th>VARIANCE</th>
                            <th>YR3 Budget</th>
                            <th>YEAR 3</th>
                            <th>VARIANCE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($table as $key=>$row)
                        <tr>
                            <td colspan="2" id="cost_item_{{ $row->cost_item  }}">{{$makers[$key] }}</td>
                            <td colspan="5" id="description_{{ $row->cost_item  }}">{{$row->description}}</td>
                            <td contentEditable="<?= $project_role != 'owner' ? false : true ?>" class="edit" id="total_budget_{{ $row->cost_item  }}" data-name="price" oninput="totalValue('total_budget','{{$row->cost_item }}')">{{ $row->total_budget}}</td>
                            <td contentEditable="<?= $project_role != 'owner' ? false : true ?>" class="edit" id="q1_{{ $row->cost_item  }}" data-name="price" oninput="totalValue('q1','{{$row->cost_item }}')">{{ $row->q1 }}</td>
                            <td contentEditable="<?= $project_role != 'owner' ? false : true ?>" class="edit" id="q2_{{ $row->cost_item  }}" data-name="price" oninput="totalValue('q2','{{$row->cost_item }}')">{{ $row->q2}}</td>
                            <td contentEditable="<?= $project_role != 'owner' ? false : true ?>" class="edit" id="q3_{{ $row->cost_item  }}" data-name="price" oninput="totalValue('q3','{{$row->cost_item }}')">{{ $row->q3}}</td>
                            <td contentEditable="<?= $project_role != 'owner' ? false : true ?>" class="edit" id="q4_{{ $row->cost_item  }}" data-name="price" oninput="totalValue('q4','{{$row->cost_item }}')">{{ $row->q4}}</td>
                            <td contentEditable="<?= $project_role != 'owner' ? false : true ?>" class="edit" id="q5_{{ $row->cost_item  }}" data-name="price" oninput="totalValue('q5','{{$row->cost_item }}')">{{ $row->q5}}</td>
                            <td contentEditable="<?= $project_role != 'owner' ? false : true ?>" class="edit" id="q6_{{ $row->cost_item  }}" data-name="price" oninput="totalValue('q6','{{$row->cost_item }}')">{{ $row->q6}}</td>
                            <td contentEditable="<?= $project_role != 'owner' ? false : true ?>" class="edit" id="q7_{{ $row->cost_item  }}" data-name="price" oninput="totalValue('q7','{{$row->cost_item }}')">{{ $row->q7}}</td>
                            <td contentEditable="<?= $project_role != 'owner' ? false : true ?>" class="edit" id="q8_{{ $row->cost_item  }}" data-name="price" oninput="totalValue('q8','{{$row->cost_item }}')">{{ $row->q8}}</td>
                            <td contentEditable="<?= $project_role != 'owner' ? false : true ?>" class="edit" id="q9_{{ $row->cost_item  }}" data-name="price" oninput="totalValue('q9','{{$row->cost_item }}')">{{ $row->q9}}</td>
                            <td contentEditable="<?= $project_role != 'owner' ? false : true ?>" class="edit" id="q10_{{ $row->cost_item  }}" data-name="price" oninput="totalValue('q10','{{$row->cost_item }}')">{{ $row->q10}}</td>
                            <td contentEditable="<?= $project_role != 'owner' ? false : true ?>" class="edit" id="q11_{{ $row->cost_item  }}" data-name="price" oninput="totalValue('q11','{{$row->cost_item }}')">{{ $row->q11}}</td>
                            <td contentEditable="<?= $project_role != 'owner' ? false : true ?>" class="edit" id="q12_{{ $row->cost_item  }}" data-name="price" oninput="totalValue('q12','{{$row->cost_item }}')">{{ $row->q12}}</td>

                            <td id="PROJECT{{ $row->cost_item  }}" data-name="price" contentEditable="false" class="edit">{{ $row->projectTotal}}</td>
                            <td id="VARIANCE{{ $row->cost_item  }}" data-name="price" contentEditable="false" class="edit">{{ $row->projectVariance}}</td>

                            <td contentEditable="<?= $project_role != 'owner' ? false : true ?>" class="edit" id="y1_budget_{{ $row->cost_item  }}" data-name="price" oninput="totalValue('y1_budget','{{$row->cost_item }}')">{{ $row->y1_budget}}</td>
                            <td id="YEAR_1{{ $row->cost_item  }}" data-name="price" contentEditable="false" class="edit">{{ $row->YEAR_1}}</td>
                            <td id="VARIANCE_1{{ $row->cost_item  }}" data-name="price">{{ $row->VARIANCE_1}}</td>
                            <td contentEditable="<?= $project_role != 'owner' ? false : true ?>" class="edit" id="y2_budget_{{ $row->cost_item  }}" data-name="price" oninput="totalValue('y2_budget','{{$row->cost_item }}')">{{ $row->y2_budget}}</td>
                            <td id="YEAR_2{{ $row->cost_item  }}" data-name="price" contentEditable="false" class="edit">{{ $row->YEAR_2}}</td>
                            <td id="VARIANCE_2{{ $row->cost_item  }}" data-name="price" contentEditable="false" class="edit">{{ $row->VARIANCE_2}}</td>
                            <td contentEditable="<?= $project_role != 'owner' ? false : true ?>" class="edit" id="y3_budget_{{ $row->cost_item  }}" data-name="price" oninput="totalValue('y3_budget','{{$row->cost_item }}')">{{ $row->y3_budget}}</td>
                            <td id="YEAR_3{{ $row->cost_item  }}" data-name="price" contentEditable="false" class="edit">{{ $row->YEAR_3}}</td>
                            <td id="VARIANCE_3{{ $row->cost_item  }}" data-name="price" contentEditable="false" class="edit">{{ $row->VARIANCE_3}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="table-info" style="border-bottom: 3px solid #565656; border-top: 3px solid #565656;">
                            <td colspan="2"></td>
                            <td colspan="5">Total Cost (for each claim)</td>
                            @foreach($columns as $key=>$column)
                            <td id="{{$column}}" data-name="price" contentEditable="false" class="edit">{{$colSum[$key]}}</td>
                            @endforeach
                        </tr>
                        <tr class="table-info" style="border-bottom: 3px solid #565656; border-top: 3px solid #565656;">
                            <td colspan="2"></td>
                            <td colspan="5">Total Cost (cumulative)</td>
                            @foreach($columns as $ckey=>$column)
                            <td id="second{{$column}}" data-name="price" contentEditable="false" class="edit">{{$col2Sum[$ckey]}}</td>
                            @endforeach
                        </tr>
                    </tfoot>
                </table>
            </div>
            @if($project_role != 'owner')
            <div class="row">
                <div class="col-md-12 mt-3 mb-2">
                    <button id="sub" type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
            @endif


        </form>

        @include('partner.detailed_tables')


    </div>
    </div>


    <!-- Jquery JS-->
    <script src="/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/vendor/slick/slick.min.js">
    </script>
    <script src="/vendor/wow/wow.min.js"></script>
    <script src="/vendor/animsition/animsition.min.js"></script>
    <script src="/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/vendor/select2/select2.min.js">
    </script>
    <script src="/vendor/vector-map/jquery.vmap.js"></script>
    <script src="/vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="/vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="/vendor/vector-map/jquery.vmap.world.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/en-gb.js" integrity="sha256-VWXSrU6D6hQJ7MEZ9062PvZDwmeRuZ8eE/ToQ2N3QjA=" crossorigin="anonymous"></script>

    <!-- Main JS-->
    <script src="/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.3.2/bootbox.min.js" integrity="sha256-s87nschhfp/x1/4+QUtIa99el2ot5IMQLrumROuHZbc=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $("td").focus(function(e) {
                if ($(this).text() == '0.00' || $(this).text() == '0') {
                    $(this).text('');
                }
            })
            $("td").blur(function() {
                if ($(this).text() == '') {
                    $(this).text('0.00');
                }
            })
            let partnerID = '<?php echo $partnerID ?>';
            $("#partner").change(function() {
                partnerID = $("#partner").val();
                var to_url = '<?php echo URL::to("/partner") ?>' + '/' + partnerID;
                console.log(partnerID)
                window.location.href = to_url;
            });
            $('[contenteditable="true"]').keypress(function(e) {
                var x = event.charCode || event.keyCode;
                if (isNaN(String.fromCharCode(e.which)) && x != 46 || x === 32 || x === 13 || (x === 46 && event.currentTarget.innerText.includes('.'))) e.preventDefault();
            });
            // Save data
            const itemsToBeSubmitted = [];
            document.querySelector('button').addEventListener('click', function() {
                var costItems = <?php echo json_encode($costItems); ?>;
                var colums = <?php echo json_encode($ColumnsFull); ?>;
                totalBudget = 0;
                var claimTable = [];
                Object.keys(costItems).forEach(function(rkey, row) {
                    claimTable.push([]);
                });

                Object.keys(costItems).forEach(function(rkey, row) {
                    colums.forEach(function(ckey, cindex) {
                        var id = "#" + ckey + '_' + costItems[rkey]['cost_item'];
                        if (cindex == 0) {
                            claimTable[row].push(costItems[rkey]['cost_item']);
                        } else {
                            claimTable[row].push($(id).text());
                        }
                    })
                });
                var data = {
                    partnerID: <?php echo $partnerID ?>,
                    table: claimTable,

                }
                $.ajax({
                    url: '/claim/storenew',
                    type: 'post',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    data: JSON.stringify(data),
                    success: (response) => {
                        window.location.reload();
                        alert('Success! Data as been successfully saved');
                    }
                });

            });
        });

        var totalBudget

        function totalValue(indicator, trID) {

            var columns = <?php echo json_encode($columns); ?>;
            var projectTotal = 0;
            let varianceTotal = 0;
            let year1, year2, year3;
            columns.forEach(function(tdID) {
                if (tdID.indexOf('q') > -1) {
                    var colID = tdID + '_' + trID;
                    projectTotal += Number($("#" + colID).text());
                    if (tdID == 'q4') {
                        year1 = projectTotal;
                    } else if (tdID == 'q8') year2 = projectTotal - year1;
                    else if (tdID == 'q12') year3 = projectTotal - year1 - year2;
                }
            });

            let varianceID = "#VARIANCE" + trID;
            let projectID = "#PROJECT" + trID;
            let year1ID = "#YEAR_1" + trID;
            let year2ID = "#YEAR_2" + trID;
            let year3ID = "#YEAR_3" + trID;
            let varianceyear1 = "#VARIANCE_1" + trID;
            let varianceyear2 = "#VARIANCE_2" + trID;
            let varianceyear3 = "#VARIANCE_3" + trID;
            $(projectID).text(projectTotal);
            $(year1ID).text(year1);
            $(year2ID).text(year2);
            $(year3ID).text(year3);

            let totalValue = $("#total_budget_" + trID).text();
            $(varianceID).text(totalValue - projectTotal);

            let year1Value = $("#y1_budget_" + trID).text();
            $(varianceyear1).text(year1 - year1Value);
            let year2Value = $("#y2_budget_" + trID).text();
            $(varianceyear2).text(year2 - year2Value);
            let year3Value = $("#y3_budget_" + trID).text();
            $(varianceyear3).text(year3 - year3Value);
            var costItems = <?php echo json_encode($costItems); ?>;
            totalBudget = 0;
            var id;
            Object.keys(costItems).forEach(function(key) {
                id = indicator + '_' + costItems[key]['cost_item'];
                totalBudget += Number($("#" + id).text());
            });

            $("#" + indicator).text(totalBudget);
            if (id.indexOf('q') > -1) {
                pos = columns.indexOf(indicator);
                beforeTr = "#second" + columns[pos - 1];
                secondTr = "#second" + indicator;
                let before = Number($(beforeTr).text());
                let top = Number($("#" + indicator).text());
                $(secondTr).text(before + top);

            }
        }
    </script>
</body>

</html>
<!-- end document-->
