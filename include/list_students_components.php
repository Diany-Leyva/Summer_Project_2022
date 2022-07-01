<?php

// --------------------------------------------------------------------------

function echoSearchBar($heading){
    echo"
    <div class='flex-container-searchBarButtons'>
        <div>
            <h2>$heading</h2>
            <div class='flex-item-SearchBar'>
                <form action='' class='search-bar' method='post'>
                <input type='text' placeholder='Search' name='searchBar'>
                <a class='searchB' type='submit'><img class= 'searchButton'src='/images/search.jpg' alt='search'></a>
                </form>
            </div> 
        </div>     
";    
}

// --------------------------------------------------------------------------

function echoAddStudentButton($buttonText){
    echo"
        <div class='flex-item-buttons'>              
            <button class='zoom' onclick= \"document.getElementById('addStudentForm').style.display='block'\" style='width:fit-content;'>$buttonText</button>
        </div>
    </div>    
";    
}

// --------------------------------------------------------------------------

function echoStudentTable($students){
    echo"
    <div class='studentTable'>
        <table id='tableContainer'>
            <tr>
                <th>Delete</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>ELO</th>
                <th>Credits</th>
                <th>Classes</th>
                <th>Next Class in</th>                   
            </tr>
"; 

//Here in line 54 I'm 
    foreach($students as $student){ 
        $studentId = $student['StudentId'];                                                       
        echo"
        <tr>      
            <td><button class='zoom' onclick='openDeleteForm($studentId)'>X</button></td>
            <td><a href='student_profile.php?studentId=".$student['StudentId']."'>".$student['FirstName']." ".$student['LastName']."</a></td>    
            <td>".$student['Email']."</td>
            <td>".$student['Phone']."</td>
            <td>".$student['ELO']."</td>   
            <td>".$student['Credits']."</td>   
            <td>".$student['Classes']."</td>";
            
            $daysToNextCLass = $student['DaysToNextClass']['Days']." days";
            
            if($student['DaysToNextClass']['Months'] != 0){
                $daysToNextCLass = $student['DaysToNextClass']['Months']." months and ".$student['DaysToNextClass']['Days']. " days";
            }
        echo"
            <td>$daysToNextCLass</td>                                    
        </tr>
";     
} 
echo"</table>
</div>
";
}  

// --------------------------------------------------------------------------
