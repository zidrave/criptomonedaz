![image](https://github.com/user-attachments/assets/01d1b53c-52b5-488c-9b98-699a762f9e3b)

# Monitoree Precios de Criptomonedas en Dólares y Soles (PHP & CoinGecko API)

Este repositorio contiene un script PHP que le permite consultar y mostrar en tiempo real los precios de las principales criptomonedas en *dólares estadounidenses (USD)* y *soles peruanos (PEN)*.

Monedas primarias soportadas WorldCoin WLD, Bitcoin BTC y Ethereum ETH. (Se puede agregar mas editando el codigo)

---

**Características:**

*   Extrae el tipo de cambio USD/PEN actual directamente de *Google Finance*.
*   Utiliza la API de *CoinGecko* para obtener los precios en USD de las criptomonedas seleccionadas (Worldcoin, Bitcoin y Ethereum en este ejemplo).
*   Convierte los precios de USD a PEN utilizando el tipo de cambio obtenido de Google Finance.
*   Presenta los precios en un formato amigable y visualmente atractivo utilizando *HTML* y *Bootstrap*.

---

**¿Para quién es este script?**

*   Desarrolladores web interesados en integrar información de precios de criptomonedas en sus proyectos.
*   Usuarios que quieren un script simple para monitorear precios de criptomonedas en ambas monedas (USD y PEN).

---

**¿Cómo funciona?**

1.  El script primero obtiene el tipo de cambio USD/PEN usando una expresión regular para extraer el valor de Google Finance.
2.  Luego, utiliza la API de CoinGecko para consultar los precios en USD de las criptomonedas seleccionadas.
3.  Convierte los precios de USD a PEN utilizando el tipo de cambio obtenido.
4.  Finalmente, muestra los precios en una página web formateada con HTML y Bootstrap.

---

**Dependencias:**

*   PHP con *cURL* habilitado
*   Librería externa *Bootstrap* (opcional para el formato visual)

---

**Uso:**

1.  Clonee este repositorio.
2.  Ejecute el script `criptomonedaz.php` en su servidor web.
3.  La página web mostrará los precios actualizados de las criptomonedas en USD y PEN.

---

**Contribuciones:**

Siéntase libre de contribuir a este proyecto mejorando la funcionalidad o agregando soporte para más criptomonedas.

---

**Autor:** *zidrave*

---

**Tenga en cuenta:**

*   Este script utiliza *scraping* para extraer el tipo de cambio de Google Finance. La estructura de la página web podría cambiar en el futuro, por lo que es posible que sea necesario actualizar la expresión regular.
*   Se recomienda consultar los términos de servicio de *Google Finance* y *CoinGecko* antes de implementar este script en un entorno de producción.
