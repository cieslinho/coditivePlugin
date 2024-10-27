const productNameInput = document.getElementById('product_name')
const netPriceInput = document.getElementById('net_price')
const errorProductName = document.getElementById('error_product_name')
const errorNetPrice = document.getElementById('error_net_price')
const btn = document.querySelector('.form__btn')
const vatSelect = document.getElementById('vatSelect')
const resultProductName = document.getElementById('result_product_name')
const resultGrossPrice = document.getElementById('result_gross_price')
const resultTaxAmount = document.getElementById('result_tax_amount')
const results = document.getElementById('results')

const handleValidation = () => {
	const productName = productNameInput.value.trim()
	const netPrice = parseFloat(netPriceInput.value.trim())
	const vatRate = vatSelect.value

	errorProductName.textContent = ''
	errorNetPrice.textContent = ''

	let valid = true

	if (!productName) {
		errorProductName.textContent = 'Proszę wprowadzić nazwę produktu.'
		valid = false
	}

	if (isNaN(netPrice) || netPrice <= 0) {
		errorNetPrice.textContent = 'Proszę wprowadzić poprawną kwotę netto.'
		valid = false
	}

	if (valid) {
		let grossPrice, taxAmount

		if (vatRate === 'zw' || vatRate === 'np' || vatRate === 'o.o.') {
			grossPrice = netPrice
			taxAmount = 0
		} else {
			const vat = parseFloat(vatRate) / 100
			grossPrice = netPrice * (1 + vat)
			taxAmount = grossPrice - netPrice
		}

		resultProductName.textContent = productName
		resultGrossPrice.textContent = grossPrice.toFixed(2)
		resultTaxAmount.textContent = taxAmount.toFixed(2)
	}
	results.classList.add('active')
}

productNameInput.addEventListener('input', handleValidation)
netPriceInput.addEventListener('input', handleValidation)
vatSelect.addEventListener('change', handleValidation)
btn.addEventListener('click', event => {
	// event.preventDefault()
	handleValidation()
})
