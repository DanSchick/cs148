<?php include('top.php');

// first we display all columns from table

print '<p id="records">';
print 'Scroll Down!<br>||<br||><br>||<br>V';

$query = 'SHOW COLUMNS FROM tblSections';
$info = $thisDatabaseReader->select($query, "", 0, 0);

$span = count($info);

//print out the table name and how many records there are
print '<table>';

$query = 'SELECT * FROM tblSections WHERE fldStart=? AND fldBuilding=?';
$data = array("13:10:00", "KALKIN");
$a = $thisDatabaseReader->select($query, $data, 1, 1, 0, 0, false, false);

print '<tr>';
print '<th colspan=' . $span . '>' . $query;
print '</th>';
print '</tr>';

print '<tr>';
print '<th colspan=' . $span . '>' . $tableName;
print ' ' . count($a) . ' records';
print '</th>';
print '</tr>';

// print out the column headings, note i always use a 3 letter prefix
// and camel case like pmkCustomerId and fldFirstName
print '<tr>';
$columns = 0;
foreach ($info as $field) {
    print '<td>';
    $camelCase = preg_split('/(?=[A-Z])/', substr($field[0], 3));

    foreach ($camelCase as $one) {
        print $one . " ";
    }

    print '</td>';
    $columns++;
}
print '</tr>';




//now print out each record
    $query = 'SELECT * FROM tblSections WHERE fldStart= ? AND fldBuilding=?';
    $data = array("13:10:00", "KALKIN");
    $info2 = $thisDatabaseReader->select($query, $data, 1, 1, 0, 0, false, false);

    $highlight = 1; // used to highlight alternate rows
    foreach ($info2 as $rec) {
        $highlight++;
        if ($highlight % 2 != 0) {
            $style = ' odd ';
        } else {
            $style = ' even ';
        }
        print '<tr class="' . $style . '">';
        for ($i = 0; $i < $columns; $i++) {
            print '<td>' . $rec[$i] . '</td>';
            print '<br>';
        }
        print '</tr>';
    }

    // all done
    print '</table>';
    print '</p>';

print '</article>';
include "footer.php";
?>
