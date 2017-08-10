var mainimg = document.getElementById('teamMainImg');
var main = document.getElementById('teamMain');
var thumbs = document.getElementById('teamThumbs');

var requestURL = 'js/employees.json';
var request = new XMLHttpRequest();
request.open('GET', requestURL);
request.responseType = 'json';
request.send();

request.onload = function() {
    var employees = request.response;
    var emp = employees['employees'];
    var firstEmp = emp[0];

    populateMainEmployee(firstEmp);
    showEmployees(employees, firstEmp);
}

function populateMainEmployee(employee) {
    var animated = document.createElement('div');
    var myImg = document.createElement('img');
    var myName = document.createElement('h3');
    var myTitle = document.createElement('span');
    var myDesc = document.createElement('p');
    var mySocial = document.createElement('div');
    var myFacebook = document.createElement('a');
    var myTwitter = document.createElement('a');
    var myLinkedin = document.createElement('a');
    var mySpecialties = document.createElement('h6');
    var rowDiv = document.createElement('div');
    var colDiv1 = document.createElement('div');
    var colDiv2 = document.createElement('div');
    var list1 = document.createElement('ul');
    var list2 = document.createElement('ul');

    mySocial.className += ' dk_teamsocial';
    rowDiv.className += ' row';
    colDiv1.className += ' large-6 medium-12 small-12 columns';
    colDiv2.className += ' large-6 medium-12 small-12 columns';
    animated.className += ' animated bounceInRight';

    myImg.src = employee.img;
    myImg.alt =employee.name+", "+employee.title;
    myName.textContent = employee.name;
    myTitle.textContent = employee.title;
    myDesc.textContent = employee.desc;

    if(employee['social_icons'].facebook) {
        myFacebook.className += 'dk_facebook';
        myFacebook.href = employee['social_icons'].facebook;
        myFacebook.setAttribute('target', '_blank');
        myFacebook.innerHTML = '<i class="fa fa-fw fa-facebook" aria-hidden="true"></i>';
        mySocial.appendChild(myFacebook);
    }
    if(employee['social_icons'].twitter) {
        myTwitter.className += 'dk_twitter';
        myTwitter.href = employee['social_icons'].twitter;
        myTwitter.setAttribute('target', '_blank');
        myTwitter.innerHTML = '<i class="fa fa-fw fa-twitter" aria-hidden="true"></i>';
        mySocial.appendChild(myTwitter);
    }
    if(employee['social_icons'].linkedin) {
        myLinkedin.className += 'dk_twitter';
        myLinkedin.href = employee['social_icons'].linkedin;
        myLinkedin.setAttribute('target', '_blank');
        myLinkedin.innerHTML = '<i class="fa fa-fw fa-linkedin" aria-hidden="true"></i>';
        mySocial.appendChild(myLinkedin);
    }
    // Create h6 tag above education/specialty lists
    mySpecialties.textContent = 'Specialties and Education:';

    // Seperate specialites to both lists evenly
    specArry = employee['specialites'];
    for(var i = 0; i < specArry.length; i++) {
        var newItem = document.createElement('li');
        newItem.innerHTML = '<i class="fa fa-caret-right" aria-hidden="true"></i> '+specArry[i];
        if(i%2 == 0) {
            //even index, add to list 1
            list1.appendChild(newItem);
        } else {
            //odd index, add to list 2
            list2.appendChild(newItem);
        }
    }

    //append lists to proper divCol
    colDiv1.appendChild(list1);
    rowDiv.appendChild(colDiv1);
    if(specArry.length > 1) {
        colDiv2.appendChild(list2);
        rowDiv.appendChild(colDiv2);
    }

    mainimg.appendChild(myImg);
    myName.appendChild(myTitle);
    animated.appendChild(myName);
    animated.appendChild(mySocial);
    animated.appendChild(myDesc);
    animated.appendChild(mySpecialties);
    animated.appendChild(rowDiv);
    main.appendChild(animated);
}

function showEmployees(jsonObj, newMain) {
    var emp = jsonObj['employees'];

    for(i = 0; i < emp.length; i++) {

        if(emp[i]["id"] != newMain["id"]) {
            var myDiv = document.createElement('div');
            var myLink = document.createElement('a');
            var myImg = document.createElement('img');
            var myName = document.createElement('h3');
            var myTitle = document.createElement('span');

            myLink.id = "link_"+i;
            myLink.onclick = createClickHandler(emp[i], jsonObj);
            myImg.src = emp[i].img;
            myImg.alt = emp[i].name+", "+emp[i].title;
            myName.textContent = emp[i].name;
            myTitle.textContent = emp[i].title;

            myName.appendChild(myTitle);
            myLink.appendChild(myImg);
            myLink.appendChild(myName);
            myDiv.appendChild(myLink);
            myDiv.className += 'column dk_team_member animated pulse';
            thumbs.appendChild(myDiv);
        }
    }
}

var createClickHandler = function(emp, jsonObj) {
    return function() {
        removeMainEmployee();
        setTimeout(populateMainEmployee(emp), 6000);
        removeThumbs();
        showEmployees(jsonObj, emp);
    };
}

function removeMainEmployee() {
    var myNode = document.getElementById("teamMain");
    var myImg = document.getElementById("teamMainImg");

    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
    while (myImg.firstChild) {
        myImg.removeChild(myImg.firstChild);
    }

}

function removeThumbs() {
    var myNode = document.getElementById("teamThumbs");
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
}
