// Informations externes :
    
  const urlXml = "http://fe.digitalinit.net/data/immo.xml";
  const urlImg = "http://fe.digitalinit.net/data/img/";

// Listes de concordance :
  const type_bien = ["Maison","Villa","Appartement","Studio"];
  const type_annonce = ["Vente","Location"];


  /**
   * Adaptation de la valeur provenant du fichier xml 
   * @param {*} num : id du bien
   * @returns : id-1
   */
  function typeBien(num){
      if (parseInt(num)){
          return type_bien[num-1];
      }
  }


/**
 * Adaptation de la valeur provenant du fichier xml 
 * @param {*} num : id du bien
 * @returns : id-1
 */
  function typeannonce(num){
      if (parseInt(num)){
          return type_annonce[num-1];
      }
  }

  /**
   * Affiche une asterisque si le bien appartient à l'utilisateur 1
   * @param {*} num 
   * @returns : une étoile (ou pas)
   */
  function isIDuser(num){
      if(parseInt(num) === 1){
          return "*"
      } else{ 
          return ""
      }
  }
let immo;


  // Récupération du fichier xml
  
  /**
   *  Récupération des données distantes
   */
  function getData(){
  $.ajax({
      type : "POST",
      url: urlXml,
      dataType: 'xml',
      success : function(data){
          //immo = Object.values($(data).find("bien"));
          immo = $(data).find("bien");
          //getImmo();

          // Pour chaque bien trouvé :
          $(data).find("bien").each(function(){
              // on génère les variables
              
              let getId_bien = $(this).find("id_bien").text() ;
              let getId_user = $(this).find("id_user").text();
              let getType_annonce = $(this).find("type_annonce").text();
              let getType_bien = $(this).find("type_bien").text();
              //let getSold = $(this).find("sold").text();
              let getLib  = $(this).find("lib").text();
              let getDesc = $(this).find("description").text();
              let getPrix = $(this).find("prix").text();
              let getPhoto = $(this).find("photo").text();
              let getClasse_energie = $(this).find("classe_energie").text();
              let getChambre = $(this).find("chambre").text();
              let getSdb = $(this).find("sdb").text();        
              let getWc = $(this).find("wc").text();
              let getSt = $(this).find("st").text();
              let getSh = $(this).find("sh").text();

              // on ajoute l'encart du bien
              $("#results").append(
              '<div id="'+ getId_bien +'" class="col-sm-4"> '+
                  '<div class="card">'+
                      '<img src="'+urlImg+getPhoto+'" class="card-img-top" alt="photo">'+
                      '<div class="card-body">'+
                          '<h5 class="card-title">'  +
                              "libelé : "+ getLib +
                          '</h5>' +
                          '<p class="description">' + 
                              getDesc +
                          '</p>'+
                          '<div class="row">' +
                              '<div class="col"><p>   ' +
                                  typeBien(getType_bien) + 
                              '   </p></div>'+
                              '<div class="col text-right"><p>'+
                                  getPrix +
                              ' €</p></div>' +
                          '</div>'+
                          '<div class="row">'+
                          '<div id="ColorTypeAnnonce"class="col"> En '+typeannonce(getType_annonce) +'</div>'+
                          '<div class="col text-right">'+ isIDuser(getId_user) +'</div>'+
                          '</div>' +
                          '<div"><button class="btn btn-secondary stretched-link" type="button" data-toggle="modal" data-target="#modal'+getId_bien+'">Consulter</button></div>  ' +
                              // 	Ajout de la modale correspondant au bien
                          '<div class="modal" id="modal'+getId_bien+'">'+
                            '<div class="modal-dialog modal-xl">'+
                              '<div class="modal-content">'+
                            
                              // Modal Header
                                '<div class="modal-footer">'+
                                '<button type="button" class="btn btn-secondary" data-dismiss="modal">Retour à la liste</button>'+
                                '</div>'+
                            
                              // Modal body
                                '<div class="modal-body container row">'+
                                // image
                                '<div class="col"> '+
                                  '<img src="'+urlImg+getPhoto+'" class="card-img-top" alt="photo">'+
                                '</div>'+
                                // détail du bien
                                '<div class="container col border shadow">'+
                                  '<fieldset >' +
                                    '<legend> Détail du bien </legend> '+
                                    '<div class="row ">'+
                                      '<div class="col  "> '+ getLib+'</div>'+ 
                                      '<div class="col  ">Type annonce :'+ typeannonce(getType_annonce) +'</div>'+
                                    '</div>'+
                                    '<div class="row">'+
                                      '<div class="col  "> type bien : '+ typeBien(getType_bien) + '</div>'+ 
                                      '<div class="col  ">prix : '+ getPrix+' €</div>'+
                                      '<div class="col  "> '+
                                        '<input id="boxcheck" type="checkbox" id="scales" name="scales">'+
                                        '<label for="boxcheck">Vendu/loué</label>'+
                                      '</div>'+
                                    '</div>'+
                                    '<div class="  "> '+ getDesc+' </div>'+
                                    '<div class="row">'+
                                      '<div class="col  "> Classe énergétique : '+ getClasse_energie+'</div>'+
                                      '<div class="col  ">Sup. habitable :'+getSh+' m²</div>'+
                                    '</div>'+
                                    '<div class="row">'+
                                      '<div class="col-3  ">Chambre : '+getChambre+'</div>'+
                                      '<div class="col  ">Salle de bain : '+getSdb+'</div>'+
                                      '<div class="col-2  ">WC : '+getWc+'</div>'+
                                      '<div class="col  ">Sup. terrain : '+getSt+' m²</div>'+
                                    '</div>'+
                                  '</fieldset>'+
                                '</div>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                          '</div>'+

                  '</div>'+
              '</div>'
              

              );
              
              //let ColorTypeAnnonce = document.getElementById("ColorTypeAnnonce");
              //console.log(ColorTypeAnnonce);
              //console.log(ColorTypeAnnonce.textContent);
          })
      


      },
      //async: false
      });
  }
  getData();


  // Configuration de la couleur de l'annonce



      // Configuration des boutons
      // -------------------------
      
      // Constante des boutons :
      const btnDeco = document.getElementById("btnDeco");
      const btnMesBiens = document.getElementById("btnMesBiens");
      const btnAll = document.getElementById("btnAll");
      const btnall = document.getElementById("btnall");
      const btnVente = document.getElementById("btnVente");
      const btnLocation = document.getElementById("btnLocation");
      
      // Comportement des boutons :
      // Bouton deconnexion :
      // --------------------
      btnDeco.addEventListener('click', function(){
        window.open("./logout.php", "_self");
      });
      // =========================
      
      // Bouton mes biens
      // ----------------
      btnMesBiens.addEventListener('click', function(){
        // on modifie l'état du flag sur l'autre bouton
        btnAll.classList.remove("selected");
        btnMesBiens.classList.add("selected");
        
        // on cache les biens qui ne correspondent pas à "id_user"
        immo.each(function(){
          let getId_user = $(this).find("id_user").text();
          let getId_bien = $(this).find("id_bien").text() ;
          const bien = document.getElementById(getId_bien)
          if (getId_user === "1" ){
            bien.style.display='block';
          } else {
            bien.style.display='none';
          }
        });
      });
      // =========================

      // Bouton tous les biens
      // ---------------------
      btnAll.addEventListener('click', function(){
        // on modifie l'état du flag sur l'autre bouton
        btnMesBiens.classList.remove("selected");
        btnAll.classList.add("selected");

        // on affiche tous les biens
        immo.each(function(){
          let getId_bien = $(this).find("id_bien").text() ;
          const bien = document.getElementById(getId_bien)
          bien.style.display='block';
        });
      });
      // =========================
      // Bouton Tout
      // -----------
      btnall.addEventListener('click', function(){

        // on vérifie quel bouton a été sélectionné (mes biens ou tous les biens)
        if (btnAll.classList.contains("selected")){
          immo.each(function(){
            const getId_bien = $(this).find("id_bien").text() ;
            const bien = document.getElementById(getId_bien)
            bien.style.display='block';
          });
        } else {
          immo.each(function(){
            let getId_user = $(this).find("id_user").text();
            let getId_bien = $(this).find("id_bien").text() ;
            const bien = document.getElementById(getId_bien)
            if (getId_user === "1" ){
              bien.style.display='block';
            } else {
              bien.style.display='none';
            }
          });
        }
      });

      // Bouton Vente
      // ------------
      btnVente.addEventListener('click',function(){

        if (btnAll.classList.contains("selected")){
          immo.each(function(){
            let getType_annonce = $(this).find("type_annonce").text();
            let getId_bien = $(this).find("id_bien").text() ;
            const bien = document.getElementById(getId_bien);
            if(typeannonce(getType_annonce) !== "Vente"){
              bien.style.display='none';
            }else {
              bien.style.display='block';
            }
          })
        } else {
          immo.each(function(){
            let getType_annonce = $(this).find("type_annonce").text();
            let getId_bien = $(this).find("id_bien").text() ;
            let getId_user = $(this).find("id_user").text();
            const bien = document.getElementById(getId_bien);
            if(typeannonce(getType_annonce) === "Vente" && getId_user === "1"){
              bien.style.display='block';
            }else {
              bien.style.display='none';
            }
          })
        }

      });
      // =========================

      // Bouton Location
      // ---------------
      btnLocation.addEventListener('click', function(){
          // On cache tous les biens qui ne sont pas en location
          if (btnAll.classList.contains("selected")){
            immo.each(function(){
              let getType_annonce = $(this).find("type_annonce").text();
              let getId_bien = $(this).find("id_bien").text() ;
              const bien = document.getElementById(getId_bien);
              if(typeannonce(getType_annonce) !== "Location"){
                bien.style.display='none';
              }else {
                bien.style.display='block';
              }
            })
          } else {
            immo.each(function(){
              let getType_annonce = $(this).find("type_annonce").text();
              let getId_bien = $(this).find("id_bien").text() ;
              let getId_user = $(this).find("id_user").text();
              const bien = document.getElementById(getId_bien);
              if(typeannonce(getType_annonce) === "Location" && getId_user === "1"){
                bien.style.display='block';
              }else {
                bien.style.display='none';
              }
            })
          }
      });
