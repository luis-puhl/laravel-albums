FROM nginx:alpine

COPY nginx.conf /etc/nginx/
RUN rm -rf /etc/nginx/conf.d
COPY conf.d/ /etc/nginx/conf.d
COPY sites-available/ /etc/nginx/sites-available
