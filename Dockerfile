# syntax=docker/dockerfile:1

FROM node:20-alpine AS base
WORKDIR /app
COPY package.json ./
RUN npm install

# Dev server (hot reload), used by `docker compose up dev`
FROM base AS dev
COPY . .
EXPOSE 5173
CMD ["npm", "run", "dev", "--", "--host", "0.0.0.0"]

# Production build
FROM base AS build
COPY . .
RUN npm run build

# Static preview of the build, served by nginx
FROM nginx:alpine AS preview
COPY --from=build /app/dist /usr/share/nginx/html
EXPOSE 80
