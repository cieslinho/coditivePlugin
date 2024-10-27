# Tax Calculator Plugin

Plugin WordPress służący do obliczania kwoty brutto oraz podatku od kwoty netto. Umożliwia użytkownikom wypełnienie formularza i wyświetlenie wyników na stronie za pomocą shortcode.

## Funkcje

- Formularz umożliwia wpisanie:
  - **Nazwa produktu** - pole tekstowe
  - **Kwota netto** - pole liczbowe
  - **Stawka VAT** - wybór z listy (pole select)
- Po obliczeniu formularz wyświetla kwotę brutto oraz kwotę podatku.
- Wyniki są zapisywane w niestandardowym typie posta (CPT) `taxdata` z datą wypełnienia i adresem IP użytkownika.

## Instalacja

1. Pobierz lub sklonuj repozytorium.
2. Umieść folder `tax-calculator` w katalogu `/wp-content/plugins/`.
3. W panelu WordPress przejdź do **Wtyczki** i aktywuj `Tax Calculator`.

## Użycie

1. Dodaj shortcode `[form_coditive]` do treści strony lub wpisu, aby wyświetlić formularz kalkulacji.
2. Po wypełnieniu formularza wynik (kwota brutto i kwota podatku) zostanie automatycznie wyświetlony na stronie.

## Shortcode `[form_coditive]`

### Pola formularza

- **Nazwa produktu**: pole tekstowe
- **Kwota netto**: pole liczbowe
- **Waluta**: `PLN` (pole tekstowe, zablokowane do edycji)
- **Stawka VAT**: wybór z listy

### Zapis danych

Po wypełnieniu formularza dane są zapisywane jako wpisy CPT `taxdata`, zawierając:

- Nazwę produktu
- Kwotę netto
- Stawkę VAT
- Kwotę brutto
- Kwotę podatku
- Datę wypełnienia
- Adres IP użytkownika

## Wymagania

- WordPress 5.0 lub nowszy
- PHP 7.4 lub nowszy

## Autor

Plugin stworzony jako zadanie rekrutacyjne dla firmy **Coditive**.
