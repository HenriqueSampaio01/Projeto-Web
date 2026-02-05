FROM node:20

WORKDIR /app

# copia apenas os arquivos de dependência
COPY package*.json ./

# instala dependências
RUN npm install

# copia o resto do código
COPY . .

EXPOSE 3000

CMD ["npm", "start"]
