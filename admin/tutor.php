<?php
include('config.php');



session_start();
if (!isset($_SESSION['SESSION_EMAIL_ADMIN'])) {
    header("Location: ../login/index");
    die();
}
$query122 = mysqli_query($conn, "SELECT * FROM approved");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.min.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <link rel="stylesheet" href="../tailwind/output.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!--toaster scripts and links (start)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<!--toaster scripts and links (end)-->


<link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <title>Administrator</title>
</head>
<body>

<style>
  .toast {
  background-color: #ffffff;
}
.toast-message {
  color: #000000;
}
.toast-title {
  color: #000000;
}

.toast-close-button {
  color: #8f8f8f;
}
.toast-close-button:hover {
  color: #000000;
}
#toast-container>.toast-warning {
background-image: url(XCircle.svg)!important;
background-size: 24px 24px;
border-radius: 12px;
border-left: 6px solid #ffc107;
}
.toast-warning .toast-progress {
  background-color: #ff0019;
  height: 4px;
  opacity: 100%;
}
#toast-container>.toast-error {
background-image: url(XCircle.svg)!important;
background-size: 24px 24px;
border-radius: 12px;
border-left: 6px solid #dc3545;
}
.toast-error .toast-progress {
  background-color: #dc3545;
  height: 4px;
  opacity: 100%;
}
#toast-container>.toast-success {
background-image: url(CheckCircle.svg)!important;
background-size: 24px 24px;
border-radius: 12px;
border-left: 6px solid #198754;
}
.toast-success .toast-progress {
  background-color: #198754;
  height: 4px;
  opacity: 100%;
}
#toast-container>.toast-info {
background-image: url(CheckCircle.svg)!important;
background-size: 24px 24px;
border-radius: 12px;
border-left: 6px solid #0dcaf0;
}
.toast-info .toast-progress {
  background-color: #0dcaf0;
  height: 4px;
  opacity: 100%;
}
.toast {
    width: 400px !important;
}

</style>


<div class="absolute ">

<aside class="w-64 h-screen " aria-label="Sidebar">
    <div class="px-3 py-4 overflow-y-hidden  bg-gray-50 dark:bg-gray-800 h-screen">
    <a href="#" class="flex items-center pl-2.5 mb-5">
    <span class="text-2xl font-bold text-gray-600 transition-colors duration-300 dark:text-white hover:text-gray-700">OwlHub</span>
    </a>

    <ul class="pt-4 mt-4 h-1/2 border-gray-200 dark:border-gray-700  space-y-2 ">
        <li class="">
            <a href="./admin_2" class="flex items-center p-2  text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg fill="none" class="w-6 h-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                </svg>
                <span class="ml-3">Dashboard</span>
            </a>

        </li>
        <li>
            <a href="./tutor" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg fill="none" class="w-6 h-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path>
            </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Tutors</span>

            </a>
        </li>
        <li>
            <a href="./subjects" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg fill="none" class="w-6 h-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path>
            </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Subjects</span>

            </a>
        </li>
        <li>
            <a href="./studentt" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg fill="none" class="w-6 h-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path>
            </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Students</span>
            </a>
        </li>
        <li>
            <a href="paym" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"></path>
            </svg>

                <span class="flex-1 ml-3 whitespace-nowrap">Payments</span>
            </a>
        </li>

        </ul>

        <ul class="mt-24 h-1/2  space-y-2  border-gray-200 dark:border-gray-700  flex flex-col  justify-center">


            <li>
            <div class="flex items-center space-x-4">
                <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-5.jpg" alt="">
                <div class="font-medium dark:text-white">
                    <div>Andre Dan Dayaganon</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Administrator</div>
                </div>
</div>
            </li>

            <li>
            <a href="./logout2.php" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg fill="none" class="w-6 h-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25"></path>
            </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Log Out</span>

            </a>

            </li>
        </ul>

    </div>
</aside>
</div>
  <!--End Sidebarsssdasdasdas-->

    <div class="flex overflow-hidden w-full">


        <div class="w-full h-screen pl-64 ">
            <div class="bg-yellow-500 p-12 block">
                    <div class="">
                        <span class=" font-bold text-3xl">Welcome to Admin Dashboard</span>
                    </div>
                    <div class="pt-4">
                        <a href="./admin_2">
                        <span class=" font-bold text-base">Dashboard</span>
                        </a>
                        <span class=" font-bold text-base">></span>
                        <a href="./tutor">
                        <span class=" font-bold text-base">Tutor</span>
                        </a>
                        <span class=" font-bold text-base">></span>
                        <a href="./subjects">
                        <span class=" font-bold text-base">Subjects</span>
                        </a>
                        <span class=" font-bold text-base">></span>
                        <a href="./studentt">
                        <span class=" font-bold text-base">Students</span>
                        </a>
                        <span class=" font-bold text-base">></span>
                        <a href="./paym">
                        <span class=" font-bold text-base">Payments</span>
                        </a>
                    </div>
            </div>
            <div class="p-6 flex w-full justify-center">
                    <div class="w-full h-60 rounded-3xl bg-white drop-shadow-xl border flex p-2 pl-32">
                                <div class="h-40 w-80"><img src="./images/image-0.png" ></div>
                                <div class="p-12">
                                    <span class="font-medium text-3xl ">Payout Request</span>
                                    <p class="font-normal pt-4"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nulla unde at aspernatur ad laudantium voluptatem debitis, non asperiores explicabo! Dolores ipsam laudantium sed perspiciatis illo fuga quia asperiores dignissimos aliquam.</p>
                                </div>
                    </div>
            </div>
         



        <div class=" max-h-max w-full bg-red-500 p-8 pt-2 overflow-x-scroll">

            <table class="w-full h-full  text-sm  text-gray-500 drop-shadow-xl dark:text-gray-400 text-left rounded-lg">
                <thead class="bg-gray-200 h-full text-xs flex  w-full text-gray-900 uppercase rounded-lg ">
                    <tr class="flex w-full pl-6   mt-4 ">
                        <th scope="col" class="p-2 w-1/4 text-lg text-left">
                            Tutor's Name
                        </th>
                        <th scope="col" class="p-2 w-1/4 text-lg text-left">
                            Email
                        </th>
                        <th scope="col" class="p-2 w-1/4 text-lg text-left">
                            Password
                        </th>
                        <th scope="col" class="p-2 w-1/4 text-lg text-left">
                            Gov ID
                        </th>
                        <th scope="col" class="p-2 w-1/4 text-lg text-left">
                            Resume
                        </th>
                        <th scope="col" class="p-2 w-1/4 text-lg text-left">
                        Introductory Video
                        </th>
                        <th scope="col" class="p-2 w-1/4 text-lg text-left">
                        Status
                        </th>
                        <th scope="col" class="p-2 w-1/4 text-lg text-left">
                        Action
                        </th>


                    </tr>
                </thead>
                <tbody id="infos" class="custom-scrollbar block items-center justify-between overflow-y-scroll overflow-x-hidden w-full scroll-smooth" style="height: 34.5vh;" >

                <tr class="flex w-full pl-6   mt-4 ">
                        <td scope="col" class="p-2 w-1/4 text-lg text-left">
                            Tutor's Name
                        </td>
                        <td scope="col" class="p-2 w-1/4 text-lg text-left">
                            Email
                        </td>
                        <td scope="col" class="p-2 w-1/4 text-lg text-left">
                            Password
                        </td>
                        <td scope="col" class="p-2 w-1/4 text-lg truncate text-left">
                            asdjsakdlkasjdaskjdasldjasldjasljdkdj
                        </td>
                        <td scope="col" class="p-2 w-1/4 text-lg truncate text-left">
                            a,sdasjdlkasjdlkasjdlajskldjaslkjdlkasjd
                        </td>
                        <td scope="col" class="p-2 w-1/4 text-lg truncate text-left">
                        as,dasldkasl;dasldklaskd;k
                        </td>
                        <td scope="col" class="p-2 w-1/4 text-lg truncate text-left">
                        Status
                        </td>
                        <td scope="col" class="p-2 w-1/4 text-lg text-left">
                        Action
                        </td>


                    </tr>






        </tbody>
    </table>



            </div>




        </div>






    </div>






        <div class="modal  opacity-0 pointer-events-none  fixed w-full h-full top-0 left-0 flex items-center justify-center overflow-y-scroll ">
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-100"></div>

            <div class="flex modal-container bg-white w-1/2 h-1/2 p-6  rounded-lg drop-shadow-2xl z-50 overflow-y-scroll custom-scrollbar">

            <div class="modal-content block w-full   text-left  p-3">

                <div class="flex w-full  pb-3">
                    <div class=" w-full ">
                    <p class="text-2xl font-bold">Student Information</p>
                    </div>
                    <div class="">
                        <div class="modal-close cursor-pointer w-full flex items-end  z-50">
                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 18 18">
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex w-full justify-center pt-4">
                    <div class="">
                                <div id="prof" class="">

                            </div>
                        </div>
                        <div class="p-12 block  space-y-4">
                            <div class="">

                                <div  class="block">
                                    <div id="nams"  class="">

                                </div>
                                <p class="font-normal pt-2  text-sm text-gray-400">Student</p>
                                </div>
                            </div>
                            <div class="">
                                <div class="">
                                <p class="text-xl font-bold">Email</p>
                                </div>
                                <div id="emls" class="">

                                </div>
                            </div>
                            <div class="block">
                                <div class="">
                                <p class="font-bold text-xl">Contact</p>
                                </div>
                                <div id="numnum" class="">

                                </div>
                                </div>

                            </div>




                    </div>

                    <div class="block p-6">

                            <div  class="pb-6">
                                <p class="font-bold text-2xl">Valid Id</p>
                            </div>
                            <div id="valids" class="  drop-shadow-xl  object-fit rounded-lg">

                            </div>


                    </div>
                    <div class="block p-6">

                            <div  class="pb-6">
                                <p class="font-bold text-2xl">Subject Enrolled</p>
                            </div>
                            <div id="subs" class="block  p-4  w-full">
                                <div class="flex justify-center space-x-3 w-full ">
                                    <div class="w-1/2 block  border p-4 rounded-2xl drop-shadow-xl">
                                        <div class=".">
                                        <p class="font-bold text-2xl">Mathematics</p>
                                        </div>
                                        <div class="flex w-full items-center justify-end space-x-2 pt-6">
                                            <div  class="">

                                            </div>
                                            <div class="block">
                                                <p class="font-medium text-base">Francis Jade Solomon</p>
                                                <p class="font-medium text-xs">Teacher</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-1/2 drop-shadow-xl  p-6 border">asdasda123123dad</div>
                                </div>

                            </div>


                    </div>

            </div>
        </div>
    </div>


    <script>
        var url = "tutor_reg.php";



        axios.get(url)
        .then(response => {






            var tableContent = document.getElementById("infos");

            response.data.forEach(dats => {

                const row = document.createElement('tr');
                        row.className += "bg-white border-b  flex w-full items-center text-left h-16";
                        tableContent.appendChild(row);
                        const cell = document.createElement('td');
                        const cell2 = document.createElement("td");
                        const cell3 = document.createElement("td");

                        const cell6 = document.createElement("td");

                        const cell7 = document.createElement("td");
                        const cell8 = document.createElement("td");
                        const cell9 = document.createElement("td");
                        const cell10 = document.createElement("td");


                        const divs = document.createElement("div");
                        const buts = document.createElement("button");
                        buts.setAttribute("id", "dropdownDefaultButton"+dats.user_id);
                        buts.setAttribute("data-dropdown-toggle", "dropdown");
                        buts.setAttribute("type", "button");

                        //dropdown start
                        const dropdown = document.createElement("div");
                        const uls = document.createElement("ul");
                        const lis = document.createElement("li");
                        const lis2 = document.createElement("li");
                        const apps = document.createElement("button");
                        const decs = document.createElement("button");
                        dropdown.className = "z-10 hidden  absolute  bg-white divide-y divide-gray-100 rounded-lg drop-shadow-lg border w-32";
                        dropdown.setAttribute("id", "dropdown"+dats.user_id);
                        apps.setAttribute("id", "appv"+dats.user_id);
                        apps.setAttribute("data-ids", dats.user_id);
                        decs.setAttribute("id", "decs"+dats.user_id);
                        apps.className="block px-4 py-2 hover:bg-gray-100 w-full font-bold  text-green-500 dark:hover:text-black";
                        decs.className="block px-4 py-2 hover:bg-gray-100 w-full font-bold text-red-500 dark:hover:text-black";
                        uls.className="py-1 text-sm text-gray-700 dark:text-gray-200";
                        apps.innerText = "Approve";
                        decs.innerText = "Decline";
                        //dropdown end

                        //status start
                        const stas = document.createElement("span");
                        stas.className = "inline-flex  items-center text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 p-1 rounded-full";

                        stas.setAttribute("id", "stats"+dats.user_id);
                        //status end
                        const svgCodeAsString = '<svg fill="none" class="w-4 h-4" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path> </svg>';

                        cell.className = "w-1/4 text-base text-center pl-12 truncate";
                        cell2.className = "w-1/4 text-left  pl-12 truncate";
                        cell3.className = "w-1/4 text-center pl-12 truncate";

                        cell6.className = "w-1/4 text-center pl-12  truncate";
                        cell7.className = "w-1/4 text-center pl-12 truncate";
                        cell8.className = "w-1/4 text-center pl-12 truncate";
                        cell9.className = "w-1/4 text-center pl-12    truncate";
                        cell10.className = "w-1/4 text-center pl-8  align-middle  block";
                        divs.className = "relative left-2 ";
                        buts.className = "text-white bg-gray-500 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 ";


                        cell.innerText = dats.fname + " " + dats.lname;
                        cell2.innerText = dats.email;
                        cell3.innerText = dats.password;

                        cell6.innerText = dats.gov_id;
                        cell7.innerText = dats.resumes;
                        cell8.innerText = dats.video;
                        stas.innerText = dats.stats;
                        buts.innerHTML = svgCodeAsString;



                        uls.appendChild(lis);
                        uls.appendChild(lis2);
                        lis.appendChild(apps);
                        lis2.appendChild(decs);

                        dropdown.appendChild(uls);
                        cell9.appendChild(stas);

                        divs.appendChild(buts);
                        divs.appendChild(dropdown);
                        cell10.appendChild(divs);
                        row.appendChild(cell);
                        row.appendChild(cell2);
                        row.appendChild(cell3);

                        row.appendChild(cell6);
                        row.appendChild(cell7);
                        row.appendChild(cell8);
                        row.appendChild(cell9);
                        row.appendChild(cell10);


                        buts.addEventListener('click', function(event) {

                        const dropdownMenu = document.getElementById("dropdown"+dats.user_id);


                        console.log(dropdownMenu);


                        dropdownMenu.classList.toggle('hidden');


                        });
                        //approve start
                        $("#appv"+dats.user_id).click(function(e) {
                            var displaysend33 = dats.user_id;

                        axios.post('approve.php', JSON.stringify({
                            displaysend33: displaysend33
                        }))
                        .then(function (response) {
                            console.log("success");

                            $("#stats"+dats.user_id).html("Approved");
                            $("#stats" + dats.user_id).addClass("bg-green-300");
                            toastr.success("The tutor has been approved and will be notified <br>", "Success", { progressBar: true, closeButton: true });
                            setTimeout(function(){
                                toastr.clear();
                            },5000)

                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                        e.preventDefault();
                        });
                        //approve end


                        //decline start
                        $("#decs"+dats.user_id).click(function(e) {
                            var decsss = dats.user_id;


                        axios.post('decline.php', JSON.stringify({
                            decsss: decsss
                        }))
                        .then(function (response) {
                            console.log("success");



                            $("#stats"+dats.user_id).html("Declined");
                            $("#stats" + dats.user_id).addClass("bg-red-300");


                            toastr.error("The tutor has been Declined and will be notified <br>", "DELCINED", { progressBar: true, closeButton: true });
                            setTimeout(function(){
                                toastr.clear();
                            },5000)

                        })
                        .catch(function (error) {
                            console.log(error);
                        });

                        });


                      if($("#stats" + dats.user_id).html() === 'Declined'){
                        $("#stats" + dats.user_id).addClass("bg-red-300");
                        $("#dropdownDefaultButton"+dats.user_id).addClass("hidden");


                      }
                      else if($("#stats" + dats.user_id).html() === 'Pending'){
                        $("#stats" + dats.user_id).addClass("bg-yellow-500");
                      }
                      else if($("#stats" + dats.user_id).html() === 'Approved'){
                        $("#stats" + dats.user_id).addClass("bg-green-300");
                        $("#dropdownDefaultButton"+dats.user_id).addClass("hidden");
                      }



            });
        })
        .catch(error => {
            console.log(error);
        });






        document.querySelector('.dropdownDefaultButton').addEventListener('click', function(event) {
        event.preventDefault();
        event.currentTarget.nextElementSibling.classList.toggle("hidden");
        });


    </script>
</body>
</html>