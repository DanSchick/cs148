<?php include('top.php');



//now print out each record
    print '<p>Displaying Query.....<br>SELECT fldFirstName, fldLastName, COUNT(DISTINCT tblEnrolls.fnkStudentId) as total FROM tblTeachers
INNER JOIN tblSections ON tblSections.fnkTeacherNetId = tblTeachers.pmkNetId
INNER JOIN tblEnrolls ON tblEnrolls.fnkCourseId = tblSections.fnkCourseId
GROUP BY fldLastName ORDER BY total DESC;</p>';
    $query = 'SELECT fldFirstName, fldLastName, COUNT(DISTINCT tblEnrolls.fnkStudentId) as total FROM tblTeachers
INNER JOIN tblSections ON tblSections.fnkTeacherNetId = tblTeachers.pmkNetId
INNER JOIN tblEnrolls ON tblEnrolls.fnkCourseId = tblSections.fnkCourseId
GROUP BY fldLastName ORDER BY total DESC';

    print '<p><br><br><br><br> SCROLL DOWN</p>';
    $info2 = $thisDatabaseReader->select($query, $data, 0, 1, 0, 0, false, false);


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
