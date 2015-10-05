<?php include('top.php');

//now print out each record
    print '<p>Displaying Query....<br>SELECT DISTINCT tblCourses.fldCourseName, fldDays, fldStart FROM tblSections  INNER JOIN tblCourses ON  tblCourses.pmkCourseId=tblSections.fnkCourseId  INNER JOIN tblTeachers ON tblTeachers.pmkNetId=tblSections.fnkTeacherNetId  WHERE tblTeachers.fldLastName = "Horton" ORDER BY tblSections.fldStart DESC;<br><br></p>';
    $query = 'SELECT DISTINCT tblCourses.fldCourseName, fldDays, fldStart FROM tblSections  INNER JOIN tblCourses ON  tblCourses.pmkCourseId=tblSections.fnkCourseId  INNER JOIN tblTeachers ON tblTeachers.pmkNetId=tblSections.fnkTeacherNetId  WHERE tblTeachers.fldLastName = ? AND fldStart != ? ORDER BY tblSections.fldStart DESC';
    $data = array("Horton", "00:00:00");
    $info2 = $thisDatabaseReader->select($query, $data, 1, 3, 0, 0, false, false);

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
        for ($i = 0; $i < 3; $i++) {
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
