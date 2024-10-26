const productNameInput=document.getElementById("product_name"),netPriceInput=document.getElementById("net_price"),errorProductName=document.getElementById("error_product_name"),errorNetPrice=document.getElementById("error_net_price"),btn=document.querySelector(".form__btn"),vatSelect=document.getElementById("vatSelect"),resultProductName=document.getElementById("result_product_name"),resultGrossPrice=document.getElementById("result_gross_price"),resultTaxAmount=document.getElementById("result_tax_amount"),handleValidation=()=>{const e=productNameInput.value.trim(),t=parseFloat(netPriceInput.value.trim()),n=vatSelect.value;errorProductName.textContent="",errorNetPrice.textContent="";let r=!0;if(e||(errorProductName.textContent="Proszę wprowadzić nazwę produktu.",r=!1),(isNaN(t)||t<=0)&&(errorNetPrice.textContent="Proszę wprowadzić poprawną kwotę netto.",r=!1),r){let r,o;if("zw"===n||"np"===n||"o.o."===n)r=t,o=0;else{o=(r=t*(1+parseFloat(n)/100))-t}resultProductName.textContent=e,resultGrossPrice.textContent=r.toFixed(2),resultTaxAmount.textContent=o.toFixed(2)}};productNameInput.addEventListener("input",handleValidation),netPriceInput.addEventListener("input",handleValidation),vatSelect.addEventListener("change",handleValidation),btn.addEventListener("click",e=>{e.preventDefault(),handleValidation()});