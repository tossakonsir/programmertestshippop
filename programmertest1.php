<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

  <form action="" method="GET" name="myform" id="myform">
    <div class="row">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-1" style="text-align:center;">
        <p>List</p>
      </div>
      <div class="col-sm-3">
        <input type="textbox" class="form-control" name="list" value="<?php echo $_GET['list'] ?>">
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-1" style="text-align:center;">
        <p>ค้นหา</p>
      </div>
      <div class="col-sm-1">
        <input type="textbox" class="form-control" name="search" value="<?php echo $_GET['search'] ?>">
      </div>
      <input type="submit" class="btn btn-warning" value="ค้นหา">
    </div>
    <br>
    <div class="row">
      <div class="col-sm-5">
      </div>
      <div class="col-sm-1" style="text-align:center;">
        <p>ประเภทการค้นหา</p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-5">
      </div>
      <div class="col-sm-1">
        <select class="form-control input-sm" name="searchType" value="<?php echo $_GET['searchType'] ?>">

          <option <?php
                  if ($_GET['searchType'] == "linear") {
                    echo "selected";
                  } ?> value="linear">Linear Search</option>
          <option <?php
                  if ($_GET['searchType'] == "binary") {
                    echo "selected";
                  } ?> value="binary">Binary Search</option>
          <option <?php
                  if ($_GET['searchType'] == "bubble") {
                    echo "selected";
                  } ?> value="bubble">Bubble Search</option>
        </select>
      </div>
    </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
      </div>
      <p>ผลลัพธ์</p>
    </div>
    <div class="row">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3" style="border: 1px solid black">
        <div class="row">
          <div class="col-sm-4">
          </div>
          <?php
          $listValue = $_GET['list'];
          if (isset($listValue)) {
            echo "LIST : [ " . $listValue . " ]";
          }
          ?>
        </div>
        <div class="row">
          <div class="col-sm-4">
          </div>
          <?php
          $searchValue = $_GET['search'];
          if (isset($searchValue)) {
            echo "Search : " . $searchValue;
          }
          ?>
        </div>
        <div class="row">
          <div class="col-sm-4">
          </div>
          <?php
          if (isset($listValue) && isset($searchValue)) {
            echo "Result :::";
          }
          ?>
        </div>
        <?php
        $arr = preg_split("/\,/", $listValue);
        function linearSearch($arr, $searchValue)
        {
          if($arr != null && $searchValue != null){
            $i = 0;
            foreach ($arr as $val) {
              $i++
          ?>
              <div class="col-sm-4">
              </div>
              <?php
              if ($searchValue == $val) {
                echo "Round : " . $i . " ===> " . $searchValue . " = " . $val . " found !! <br>";
                break;
              } else {
                echo "Round : " . $i . " ===> " . $searchValue . " != " . $val . "<br>";
              }
            }
          }
        }
        if ($_GET['searchType'] == "linear") {
          linearSearch($arr, $searchValue);
        } else if ($_GET['searchType'] == "binary") {
          $min = 0;
          $i = 0;
          $max = count($arr) - 1;
          sort($arr); //binary ต้องเรียงก่อน
          while ($min <= $max) {
            ?>
            <div class="col-sm-4">
            </div>
        <?php
            $i++;
            $mid = floor(($min + $max) / 2);
            if ($arr[$mid] == $searchValue) {
              echo "Round : " . $i . " ===> " . $searchValue . " = " . $arr[$mid] . " found !! <br>";
              break;
            } else {
              echo "Round : " . $i . " ===> " . $searchValue . " != " . $arr[$mid] . "<br>";
            }
            if ($searchValue < $arr[$mid]) {
              $max = $mid - 1;
            } else {
              $min = $mid + 1;
            }
          }
        } else {
          $n = count($arr);
          for ($i = 0; $i < $n; $i++) {
            $swapped = False;
            for ($j = 0; $j < $n - $i - 1; $j++) {
              if ($arr[$j] > $arr[$j + 1]) {
                $t = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $t;
                $swapped = True;
              }
            }
            if ($swapped == False)
              break;
          }
          linearSearch($arr, $searchValue);
        }
        ?>
      </div>
    </div>
  </form>
</body>

</html>