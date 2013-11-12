<!DOCTYPE html>
<html lang='zh'>
<head>
    <meta charset='utf-8'>
    <title>
        PHPTool |
        RootSystem
    </title>
    <!--<link href="/assets/root/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />-->
    <link href="/assets/root/css/style.css" media="screen" rel="stylesheet" type="text/css"/>
    <script src="/assets/root/js/jquery.js" type="text/javascript"></script>
    <meta content="authenticity_token" name="csrf-param"/>

    <!--圖表模組-->
    <script type="text/javascript" src="/assets/module/canvasjs-1.3.0-beta/canvasjs.min.js"></script>
    <script type="text/javascript" src="/assets/module/canvasjs-1.3.0-beta/source/canvasjs.js"></script>
    <script type="text/javascript" src="/assets/module/canvasjs-1.3.0-beta/source/excanvas.js"></script>


</head>

<body class='ui_gray project' data-page='projects:issues:index' data-project-id='122'>
<header class='navbar navbar-static-top navbar-gitlab'>
    <div class='navbar-inner'>
        <div class='container'>
            <div class='app_logo'>
                <span class='separator'></span>
                <a href="/" class="home has_bottom_tooltip" title="Dashboard"><h1>GITLAB</h1>
                </a><span class='separator'></span>
            </div>
            <h1 class='project_name'><span><a href="#">PHPTool</a> / phpmd</span></h1>
            <ul class='nav'>
                <li>
                    <a>
                        <div class='hide turbolink-spinner'>
                            <i class='icon-refresh icon-spin'></i>
                            Loading...
                        </div>
                    </a>
                </li>
                <li>
                    <!--
                    <div class='search'>
                        <form accept-charset="UTF-8" action="/search" class="navbar-form pull-left" method="get">
                            <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden"
                                                                                  value="&#x2713;"/></div>
                            <input class="search-input" id="search" name="search" placeholder="Search in this project"
                                   type="text"/>
                            <input id="group_id" name="group_id" type="hidden"/>
                            <input id="project_id" name="project_id" type="hidden" value="122"/>
                            <input id="search_code" name="search_code" type="hidden" value="true"/>
                            <input id="repository_ref" name="repository_ref" type="hidden"/>

                            <div class='search-autocomplete-json hide'
                                 data-autocomplete-opts='[{"label":"group: rda","url":"/groups/rda"},{"label":"project: Imagine / phptool","url":"/imagine10255/phptool"},{"label":"project: rda / ball_service","url":"/rda/ball_service"},{"label":"project: rda / challenge","url":"/rda/challenge"},{"label":"My Profile","url":"/profile"},{"label":"My SSH Keys","url":"/profile/keys"},{"label":"My Dashboard","url":"/"},{"label":"Admin Section","url":"/admin"},{"label":"rda / challenge - Files","url":"/rda/challenge/tree/master"},{"label":"rda / challenge - Commits","url":"/rda/challenge/commits/master"},{"label":"rda / challenge - Network","url":"/rda/challenge/network/master"},{"label":"rda / challenge - Graph","url":"/rda/challenge/graphs/master"},{"label":"rda / challenge - Issues","url":"/rda/challenge/issues"},{"label":"rda / challenge - Merge Requests","url":"/rda/challenge/merge_requests"},{"label":"rda / challenge - Milestones","url":"/rda/challenge/milestones"},{"label":"rda / challenge - Snippets","url":"/rda/challenge/snippets"},{"label":"rda / challenge - Team","url":"/rda/challenge/team"},{"label":"rda / challenge - Wall","url":"/rda/challenge/wall"},{"label":"rda / challenge - Wiki","url":"/rda/challenge/wikis"},{"label":"help: API Help","url":"/help/api"},{"label":"help: Markdown Help","url":"/help/markdown"},{"label":"help: Permissions Help","url":"/help/permissions"},{"label":"help: Public Access Help","url":"/help/public_access"},{"label":"help: Rake Tasks Help","url":"/help/raketasks"},{"label":"help: SSH Keys Help","url":"/help/ssh"},{"label":"help: System Hooks Help","url":"/help/system_hooks"},{"label":"help: Web Hooks Help","url":"/help/web_hooks"},{"label":"help: Workflow Help","url":"/help/workflow"}]'></div>
                        </form>

                    </div>
                    -->
                </li>
                <!--
                <li>
                    <a href="#" class="has_bottom_tooltip" data-original-title="Public area"
                       title="Public area"><i class='icon-globe'></i>
                    </a></li>
                <li>
                    <a href="#" class="has_bottom_tooltip" data-original-title="Public area"
                       title="My snippets"><i class='icon-paste'></i>
                    </a></li>
                <li>
                    <a href="#" class="has_bottom_tooltip" data-original-title="New project"
                       title="Create New Project"><i class='icon-plus'></i>
                    </a></li>
                <li>
                    <a href="#" class="has_bottom_tooltip" data-original-title="Your profile" title="My Profile"><i
                            class='icon-user'></i>
                    </a></li>
                <li>
                    <a href="#" class="has_bottom_tooltip" data-method="delete"
                       data-original-title="Logout" rel="nofollow" title="Logout"><i class='icon-signout'></i>
                    </a></li>
                -->
                <li>
                    <a href="#" class="profile-pic" id="profile-pic"><img alt=""
                                                                          src="http://www.gravatar.com/avatar/3abb4325bbf0ce4d738a5857152d90bd?s=26&amp;d=mm"/>
                    </a></li>
            </ul>
        </div>
    </div>
</header>

<script>
    GitLab.GfmAutoComplete.dataSource = "/rda/challenge/autocomplete_sources"
    GitLab.GfmAutoComplete.Emoji.assetBase = '/assets/emoji'
    GitLab.GfmAutoComplete.setup();
</script>

<div class='flash-container'>
</div>


<nav class='main-nav'>
    <div class='container'>
        <ul>
            <li class="home"><a href="#" title="Project">
                    <i class='icon-home'></i>
                </a>
            </li>
            <li class="active"><a href="/phptool/phploc">PHPTool</a></li>
            <li class=""><a href="#">Config</a></li>
            <li class=""><a href="#">&nbsp;</a></li>
            <li class=""><a href="#">&nbsp;</a></li>
            <li class=""><a href="#">&nbsp;</a></li>
            <li class=""><a href="#">&nbsp;</a></li>
            <li class=""><a href="#">&nbsp;</a></li>
            <li class=""><a href="#">&nbsp;</a></li>


        </ul>
    </div>
</nav>
<div class='container'>
    <div class='content'>
        <ul class='nav nav-tabs'>

            <?php
            foreach ($toolList as $key => $value) {
                if ($key == $phptool["use"]) {
                    echo '<li class="active">';
                } else {
                    echo '<li>';
                }
                echo '<a href="/phptool/'.$key.'" class="tab">'.$value.'</a>';
            }
            ?>


            </li>
            <li class='pull-right'>
                <a href="#"><i class='icon-rss'></i>
                </a></li>
        </ul>

        <div class='issues_content'>
            <h3 class='page-title'>
                Project

                <!--
                        <div class='pull-right'>
                            <div class='span6'>
                                <a href="#"
                                   class="btn btn-new pull-right" id="new_issue_link" title="New Issue"><i class='icon-plus'></i>
                                    New Issue
                                </a>

                                <form accept-charset="UTF-8" action="/rda/challenge/issues" class="pull-right" data-remote="true"
                                      id="issue_search_form" method="get">
                                    <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;"/>
                                    </div>
                                    <input id="search_status" name="status" type="hidden"/>
                                    <input id="search_assignee_id" name="assignee_id" type="hidden"/>
                                    <input id="search_milestone_id" name="milestone_id" type="hidden"/>
                                    <input id="search_label_name" name="label_name" type="hidden"/>
                                    <input class="input-xpadding issue_search input-xlarge append-right-10 search-text-input"
                                           id="issue_search" name="issue_search" placeholder="Filter by title or description"
                                           type="search"/>

                                </form>

                            </div>
                        </div>
                    -->
            </h3>
        </div>
        <div class='row'>
            <div class='span3'>
                <form accept-charset="UTF-8" action="/rda/challenge/issues" method="get">
                    <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;"/></div>
                    <fieldset>
                        <ul class='nav nav-pills nav-stacked'>
                            <?php

                            foreach ($xmlDir as $key => $value) {
                                $source = substr($key, 0, - 1);
                                echo '<li>';
                                echo '<a href="/phptool/'.$phptool['use'].'/'.$source.'">'.$source.'</a>';
                                echo '</li>';
                            }
                            echo '<li class="active"><a href="/phptool/phpmd">All</a></li>';

                            ?>

                        </ul>
                    </fieldset>
                    <fieldset>
                    </fieldset>
                </form>


            </div>
            <div class='span9 issues-holder'>


                <?php
                if(isset($message)){
                    echo $message;
                }else{
                    ?>
                    <div id="phpmd1" style="height: 500px; width: 900px;">
                    </div>

                    <br/><br/><br/><br/>
                    <div id="phpmd2" style="height: 900px;">
                    </div>
                <?php
                }
                ?>


            </div>
        </div>
    </div>
</div>
</body>
</html>




<script type="text/javascript">


    var phpmd1 = new CanvasJS.Chart("phpmd1",
        {
            title: {
                text: "Total <?php echo $total;?>"
            },
            data: [
                {
                    type: "doughnut",
                    startAngle: 60,
                    toolTipContent: "{y} ",

                    showInLegend: true,
                    dataPoints: <?php echo json_encode($gitauth);?>

                }
            ]
        });

    phpmd1.render();

    var phpmd2 = new CanvasJS.Chart("phpmd2", {

        title: {
            text: ""

        },
        axisX: {
            interval: 1,
            gridThickness: 0,
            labelFontSize: 20,
            labelFontStyle: "normal",
            labelFontWeight: "normal",
            labelFontFamily: "Lucida Sans Unicode"

        },
        axisY2: {
            interlacedColor: "rgba(1,77,101,.2)",
            gridColor: "rgba(1,77,101,.1)"

        },

        data: [
            {
                type: "bar",
                name: "companies",
                axisYType: "secondary",
                color: "#014D65",
                dataPoints: <?php echo json_encode($gitauth);?>
            }

        ]
    });

    phpmd2.render();

</script>


