<?php require("src/Distance.php") ?>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <title>Task</title>

    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
        .div-and {
            position: relative;
            color: #aaa;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .span-and {
            display: block;
            position: absolute;
            left: 50%;
            top: -2px;
            margin-left: -25px;
            background-color: #fff;
            width: 50px;
            text-align: center;
        }

        .hr-and {
            height: 1px;
            margin-top: 0px !important;
            margin-bottom: 0px !important;
        }
    </style>
</head>

<body>
<div class="container mt-5 ">

    <div class="col-md-6 mx-auto text-center">
        <div class="header-title">
            <h1>
                OpenSooq Task
            </h1>
            <h2 class="wv-heading--subtitle">
                Hamming and Levenshtein Distance
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="form mt-4">
                <form action="/index.php" method="post" name="dis">

                    <div class="form-group">
                        <input required type="text" name="str1" class="form-control" id="str1"
                               placeholder="First String"
                               value="<?php echo $_POST["str1"]; ?>">
                    </div>

                    <div class="col-md-12 ">
                        <div class="div-and">
                            <hr class="hr-and">
                            <span class="span-and">and</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <input required type="text" name="str2" class="form-control" id="str2"
                               placeholder="Second String" value="<?php echo $_POST["str2"]; ?>"/>
                    </div>

                    <div class="form-group text-center">
                        <div class="btn-group btn-group-toggle mx-auto" data-toggle="buttons">
                            <label class="btn btn-info active">
                                <input type="radio" name="options" id="option1" value="Levenshtein" autocomplete="off"
                                       checked> Levenshtein
                            </label>
                            <label class="btn btn-info">
                                <input type="radio" name="options" id="option2" value="Hamming" autocomplete="off">
                                Hamming
                            </label>
                        </div>
                    </div>

                    <div class="text-center ">
                        <input type="submit" name="submit" class="  btn btn-block btn btn-primary" value="Find the distance"/>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <?php if (isset($_POST["submit"])) {//check if form submit
        if ($_POST["options"] == "Levenshtein") {//if option is Levenshtein
            $value = Levenshtein::distance($_POST["str1"], $_POST["str2"]);//call the helper function
        } else { //its work if option set Hamming
            $value = Hamming::distance($_POST["str1"], $_POST["str2"]);//call the helper function
        }//then print the result
        echo "<div class=\"text-center mt-4 \">
         <h4 class='text-success'>The {$_POST["options"]} distance is  :<span class='text-danger'>{$value}</span></h4>
          </div>";
    }
    ?>
    </div>
<div class="footer">
    <p>Create By Naaman Munther @2019 </p>
</div>
</body>

</html>