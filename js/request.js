function ajaxRequest(type, url, callback, data = null)
{
  let xhr;
  // Create XML HTTP request.
  xhr = new XMLHttpRequest();
    console.log(url);
  xhr.open(type, url);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  // Add the onload function.
  xhr.onload = () =>
  {
    switch (xhr.status)
    {
      case 200:
      case 201:
        console.log(xhr.responseText);
        callback(JSON.parse(xhr.responseText));
        break;
      default:
        httpErrors(xhr.status);
    }
  };

  // Send XML HTTP request.
  xhr.send(data);
}

function displayAnnounces(results){
    console.log(results)
    results['announces'].forEach(element => {
        let div_balise = document.createElement('div')
        div_balise.className = "cards"
        div_balise.style = "display:flex"
        let img_balise = document.createElement('img')
        img_balise.src = element['image']
        img_balise.className = "card-img-top"
        img_balise.width = 20
        img_balise.height = 300
        div_balise.appendChild(img_balise)

        div_card_body = document.createElement('div')
        div_card_body.className = 'card-body'
        card_txt = document.createElement('p')
        card_txt.className = 'card-text'
        card_txt.innerHTML = `Lieu : ${element['location']}<br>Superficie : ${element['area']}<br>Prix : ${element['price']}`
        div_card_body.appendChild(card_txt)

        link_balise = document.createElement('a')
        link_balise.className = "btn btn-primary"
        link_balise.innerHTML = "Contactez nous"
        link_balise.id = "contact_id"
        link_balise.addEventListener('click', () => {
            event.target.style = "display: none;"
            let email_input = document.createElement('input')
            email_input.placeholder = "john@gmail..."
            email_input.type = 'mail'

            let submit_btn = document.createElement('button')
            submit_btn.innerHTML = "Submit"
            submit_btn.className = 'btn btn-primary'
            submit_btn.addEventListener('click', () => {
                
                var response = ajaxRequest('GET', `http://127.0.0.1:5000/contact?email=${submit_btn.previousElementSibling.value}`)
                let section_balise = document.createElement('section');
                section_balise.id = 'successes'
                section_balise.className = 'container alert alert-success'
                section_balise.style = 'display: block'
                section_balise.innerHTML = "Demande reçu!"
                event.target.style = "display: none";
                event.target.after(section_balise);
            })
            
            event.target.after(email_input);
            email_input.after(submit_btn);
        }, false);
        div_card_body.appendChild(link_balise);
        div_balise.appendChild(div_card_body);


        document.getElementById('announces_container').appendChild(div_balise); 
    });
}

function display_form(){

}

ajaxRequest('GET', 'http://127.0.0.1:5000/getAnnounces', displayAnnounces)