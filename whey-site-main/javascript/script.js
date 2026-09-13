const arrayText =[
    " Mais força, mais resultado, mais você",
    " Seu treino merece o melhor whey.",
    " Nutrição inteligente para atletas de verdade.",
];
const meutempo =100; //apaga e escreve 
const romeve = 1000; // intervalo das frase

let indexSentence = 0;
let indexChar = 0 ;
const element = document.querySelector("#text");
console.log("consolo",element);
function writeTexte(){
    if(indexChar <=  arrayText[indexSentence].length){
        element.textContent= arrayText[indexSentence].substring(0,indexChar);
        indexChar++
        setTimeout(writeTexte,meutempo);
    }else{
        setTimeout(removeTexte,romeve);
    }
    
}

function removeTexte(){
    if(indexChar >= 0){
        element.textContent = arrayText[indexSentence].substring(0,indexChar);
        indexChar--;
        setTimeout(removeTexte,meutempo);
    }else{
        indexSentence++;
        if(indexSentence>= arrayText.length){
            indexSentence = 0 ;
        }
        setTimeout(writeTexte,meutempo);
    }
}
writeTexte();