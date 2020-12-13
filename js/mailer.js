const form = document.getElementById('beer-order');

form.addEventListener('submit', sendEmail)

function send(mailBody, toMail, fromMail, subject) {

    const result = Email.send({ 
        SecureToken: '8bc5abdb-ca66-4019-a449-5927d80f2955', 
        To: toMail, 
        From: fromMail, 
        Subject: subject, 
        Body: mailBody });

    result.then(res1 => {
        return res1;
    })

}

function sendEmail(event) {

    var formValues = event.target;

    var firstName = formValues["name"].value;
    var lastName = formValues["surname"].value;
    var email = formValues["email"].value;
    var city = formValues["city"].value;
    var address = formValues["address"].value;
    var phone = formValues["phone-number"].value;
    var note = formValues["message"].value;

    var mailBodyToCompany = ` 
        <p>Porudzbina:</p>
        <p>Ime:${firstName}</p>
        <p>Prezime:${lastName}</p>
        <p>Email:${email}</p>
        <p>Telefon:${phone}</p>
        <p>Grad:${city}</p>
        <p>Adresa:${address}</p>
        <p>Napomena:${note}</p>
    `

    var resFirstMail = send(mailBodyToCompany, "zocpivara@gmail.com", email, "Žoc - Nova porudzbina");
    resFirstMail.then(firstMail => {
        console.log("OK FIRST")
        var mailBodyToIssuer = ` 
        <p>Poštovani ${firstName},</p>
        <p>Vaša porudzbina je zavedena.</p>
    `
        var resSecondMail = send(mailBodyToIssuer, email, "zocpivara@gmail.com", "Žoc - Vaša porudzbina");


        resSecondMail.then(secondMail => {
            console.log("OK SECOND")
        })
            .catch(err2 => {
                console.log(err2);
            })

        // Email.send({
        //     SecureToken: '8bc5abdb-ca66-4019-a449-5927d80f2955',
        //     To: email,
        //     From: 'zocpivara@gmail.com',
        //     Subject: "Žoc - Vaša porudzbina",
        //     Body: mailBodyToIssuer
        // }).then(message => {
        //     alert(message)
        // }

        // );
    })
        .catch(err1 => {
            console.log(err1);
        })
    // Email.send({
    //     SecureToken: '8bc5abdb-ca66-4019-a449-5927d80f2955',
    //     To: 'zocpivara@gmail.com',
    //     From: email,
    //     Subject: "Žoc - Nova porudzbina",
    //     Body: mailBodyToCompany
    // }).then(message => {
    //     alert(message)
    // }

    // );
    
    event.preventDefault();
}


//   Email.send({
    //     Host : "smtp.gmail.com",
    //     Username : "zocpivara@gmail.com",
    //     Password : "pivoJe93",
    //     To : 'zocpivara@gmail.com',
    //     From : "s.tefan_ftn@live.com",
    //     Subject : "Zoc - Order",
    //     Body : "And this is the body"
    // }).then(
    //   message => alert(message)
    // );