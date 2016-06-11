<!DOCTYPE html>

<html>

    <head>
        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        
        <!-- extra styles for this app (ex: modal window)  -->
        <link href="/css/styles.css" rel="stylesheet"/>
        
        <!-- stylesheet for print settings -->
        <link href="/css/print.css"  rel="stylesheet" type="text/css" media="print">
        
        <?php if (isset($title)): ?>
            <title>Workout Maker: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Workout Maker</title>
        <?php endif ?>
        
        <!--Added for alignment, like staff example has-->
        <meta content="initial-scale=1, width=device-width" name="viewport"/>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <!-- javascript I added for this app -->
        <script src="/js/scripts.js"></script>
        

<!--Stuff for facebook links: remove if we don't end up using it-->
<!--https://developers.facebook.com/docs/plugins/share-button#configurator-->
<!-- You can use Open Graph tags to customize link previews.
Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
    
<!-- url here is should match the one on workout.php, so we'll update if we're on that page -->
    <?php 
        $content = "http://www.npworkoutmaker.com/";
//        $image = "/img/NPlogo2.jpg";
    //    $image = "/img/hoisties.jpg";
    $image = "/img/bojan1.jpg";

        
        if (isset($id))
            $content = $content . "retrieve_workout.php?workout_id=" . $id;
    ?>
	<meta property="og:url"          content="<?= $content ?>" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Workout Maker" />
	<meta property="og:description"   content="Go outside and work out" />
	<meta property="og:image"         content="<?= $image ?>" />
    </head>

    <body>
<!--    Google analytics include-->
    <?php include_once("analyticstracking.php") ?>
<!--    End Google analytics-->

        <div class="container">

            <div id="top">
                <table>
                    <tr>
                        <td><a href="/"><img alt="Workout Maker" src="<?= $image ?>" height="85"/></a></td>
                        <td>This is a workout maker for people who like free fitness
                            and want to add variety into their normal routine, or who are travelling
                            and don't have equipment.  Find some space outside or inside, check off what you've got
                            that you can use (including a partner!), and
                            this tool will make you a fresh new workout. 
                        </td>
                    </tr>
                </table>
            </div>

                    <ul class="nav nav-pills">
                        <li><a href="index.php">Make new workout</a></li>
                        <li><a href="library.php">Browse exercises</a></li>
                        <li><a href="about.php">About</a></li>
                    </ul>


            <div id="middle">
