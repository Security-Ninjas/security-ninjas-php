TAG = siege/security-ninjas:latest
NOW = $(shell /bin/date '+%Y%m%d-%H%M')
PORT = 8000

.PHONY: build update

build: Dockerfile update
	docker build -t $(TAG) .

push: Dockerfile
	docker push $(TAG)

update: Dockerfile
	sed -i '' -e 's/\(ENV updated\) .*/\1 $(NOW)/' Dockerfile

run: build
	docker run -it --rm -p $(PORT):80 $(TAG)
