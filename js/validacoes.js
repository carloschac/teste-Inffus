//Definindo as variáveis com os valores do formulário
let senha = document.getElementById('senha')
let confirmaSenha = document.getElementById('confirmaSenha')

//===================================================
//Validando se as duas senhas são iguais
function valida() {
  if (senha.value != confirmaSenha.value) {
    confirmaSenha.setCustomValidity('Senhas diferentes!')
  } else {
    confirmaSenha.setCustomValidity('')
  }
}

senha.onchange = valida
confirmaSenha.onkeyup = valida
//======================================================
