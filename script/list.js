function afficherCarte() {

    const listCarte = document.getElementsByClassName('FF8');
    console.log(listCarte);

    if (document.getElementById('ff8').checked) {
        listCarte.forEach(element => {
            element.style.display = 'block';
        });
        //listCarte.style.display = 'block';
        console.log('oui');

    } else {
        document.getElementById('FF8').style.display = "none";
        console.log('non');

    }
}