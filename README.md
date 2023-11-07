# ChatBot para Telegram con ChatGPT
Creamos un chatbot en Telegram que se conecte a ChatGPT.

## ¿Qué tal sería chatear con Papa Noel?

Así llevo desde ayer 🥹 y pues claro ... manos a la obra.

La idea es usar ChatGPT para darle personalidad a nuestro Papa Noel, y luego crear un chat mediante el que intercambiar mensajes.

La idea es sencilla:

![Imagen de Papa Noel IA](https://ablancodev.com/wp-content/uploads/2023/11/noel-ia.jpg)

#### Web

Primero pensé en un formulario web, y montar ahí el chat, vale, guay, control total, pero aburrido de narices, y más que yo para el diseño soy un cero pelotero, así que había que pensar algo más divertido.

#### ¿Whatsapp?

Ehhh, whatsapp mola 😎

Me pongo a mirar su API, a crearme la app en Meta para poder empezar, y empiezan los problemas:

- que si añadir forma de pago
- que si justificar tu cuenta de empresa
- que si pago por uso

puff pereza máxima, y encima pasar por caja, además de la caja de OpenAI, muchas cajas son esas para un pobre como yo, "I have not money !!!"

#### Telegram !!

Nunca he trasteado Telegram pero colegas me han dicho que a nivel API y dev está muy bien pensado.

Pues nada a telegramear se dijo.

Página con doc para crear un bot: [https://core.telegram.org/bots](https://core.telegram.org/bots)

Chula, eh?, pues espera que crear un primer bot es más chulo aún.

Añades a "BotFather" : [https://t.me/botfather](https://core.telegram.org/bots)

![Imagen del proceso de creación de un bot en Telegram](https://ablancodev.com/wp-content/uploads/2023/11/Captura-de-pantalla-2023-11-07-a-las-21.22.51.png)

Ahora si que has flipado, eh??? Mandándole un mensaje te deja hacer mil cosas, el "Hello World" más sencillo de la historia 👏🏻 👏🏻 👏🏻 👏🏻

Pues nada `/newbot` y creamos a **Noel_IA_Bot** 🤖 , nuestro chatbot de Papa Noel (creado, nos da nuestro Token de acceso API y doc).

Ya podemos escribirle, pero contestar va a contestar poco. Pero ... donde van nuestros mensajes ?

Tiramos de doc: [https://core.telegram.org/bots/api#setwebhook](https://core.telegram.org/bots/api#setwebhook)

Y bingo, tenemos que definir un webhook donde irán nuestros mensajes, pues nada creamos uno PHP que usaremos para recibir el mensaje del usuario y mandarle ese mensaje a ChatGPT-Noel y que nos conteste.

**Creamos nuestro webhook en PHP:**

Y ya con esto tenemos que cuando alguien escribe a Papa Noel ChatBot, Telegram manda un webhook a nuestro servidor, donde lo recibimos, y pasamos la info a nuestro ChatGPT-Noel, que nos contestará amablemente como suele hacerlo y dicha contestación se la pasamos a nuestro chatBot, círculo cerrado !! 🥳

![Imagen del flujo de comunicación con ChatGPT-Noel](https://ablancodev.com/wp-content/uploads/2023/11/noel-IA.png)

Ahora a refinar el prompt, que el que he hecho es muy muy básico, ya que me he centrado en el flujo de conexiones e información.
