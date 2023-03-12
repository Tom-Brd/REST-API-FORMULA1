function getTeams() {
    fetch('http://localhost:8888/REST-API-FORMULA1/teams')
        .then(response => response.json())
        .then(data => {
            let teamsTable = document.getElementById("teams__table--body");
            data.forEach(team => {
                let teamsList = document.createElement("tr");
                let teamListName = document.createElement('td');
                teamListName.textContent = `${team.name}`;
                teamsList.appendChild(teamListName);
                let teamListCountry = document.createElement('td');
                teamListCountry.textContent = `${team.country}`;
                teamsList.appendChild(teamListCountry);
                let teamListTeamPrincipal = document.createElement('td');
                teamListTeamPrincipal.textContent = `${team.teamPrincipal}`;
                teamsList.appendChild(teamListTeamPrincipal);
                let teamListYearOfCreation = document.createElement('td');
                teamListYearOfCreation.textContent = `${team.yearOfCreation}`;
                teamsList.appendChild(teamListYearOfCreation);
                teamsTable.appendChild(teamsList);
            });
        })
        .catch(error => console.error(error));
}

getTeams();