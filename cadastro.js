const usuario = document.getElementById("login")
const senha = document.getElementById("senha")

form.addEventListener("submit", (event) =>{
    event.preventDefault();

    //Verifica se os campos estão vazioss
    if(usuario.value === ""){
        alert("Por favor, digite seu usuario");
    return;
    }
    if(senha.value === "") {
        alert("Por favor, digite sua senha");
    return;
    }
    if(senha.value.length < 8) {
        alert("a senha deve ter no minimo 8 caracteres")
    return
    }

    //Verifica se a senha esta correta
    //if(!validaSenha(senha.value, 8)){
    //    alert("A senha precisa ser de no minimo 8 digitos.");
    //    return
    //}

    //Se todos os campos estiverem corretamente prenchidos, envie o form
    location.href = "lista.html";
});

//function validaSenha(senha, minDigitos) {
//    if(senha.lenght >= minDigitos) {
//       return true
//   } else{
//       return false
//   }
//}
