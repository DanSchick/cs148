<?php include('top.php');

//now print out each record
    print '<p>Displaying Query....<br>SELECT fldDays, fldStart FROM tblSections INNER JOIN tblTeachers ON tblSections.fnkTeacherNetId=tblTeachers.pmkNetId WHERE tblTeachers.fldLastName = "Snapp" AND fldFirstName = "Robert Raymond" ORDER BY tblSections.fldStart DESC;<br><br></p>';
    $query = 'SELECT fldDays, fldStart FROM tblSections INNER JOIN tblTeachers ON tblSections.fnkTeacherNetId=tblTeachers.pmkNetId WHERE tblTeachers.fldLastName = ?  AND fldFirstName = ? AND fldStart != ? ORDER BY tblSections.fldStart DESC';
    $data = array("Snapp", "Robert Raymond", "00:00:00");
    $info2 = $thisDatabaseReader->select($query, $data, 1, 4, 0, 0, false, false);

    $highlight = 1; // used to highlight alternate rows
    print '<table>';
    foreach ($info2 as $rec) {
        $highlight++;
        if ($highlight % 2 != 0) {
            $style = ' odd ';
        } else {
            $style = ' even ';
        }
        print '<tr class="' . $style . '">';
        for ($i = 0; $i < 2; $i++) {
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
