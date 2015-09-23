<?php include('top.php');



//now print out each record
    print '<p>Displaying Query.....<br>SELECT fldFirstName, fldLastName FROM tblTeachers WHERE pmkNetId LIKE "r%o";</p>';
    $query = 'SELECT fldFirstName, fldLastName FROM tblTeachers WHERE pmkNetId LIKE ?';
    $data = array("r%o");
    $info2 = $thisDatabaseReader->select($query, $data, 1, 0, 0, 0, false, false);


    $highlight = 1; // used to highlight alternate rows
    $columns = 4;
    print '<table>';
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
    print '</aside>';


print '</article>';
include "footer.php";
?>
