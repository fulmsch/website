SRC_DIR = src
BUILD_DIR = build
CONTENT_DIR = content


# Find all markdown files
MARKDOWN=$(shell find $(CONTENT_DIR) -iname "*.md")
# Form all php counterparts
PHP=$(subst $(CONTENT_DIR),$(BUILD_DIR),$(MARKDOWN:.md=.php))

SRC_FILES = index.php lang.de.php lang.en.php styles.css


BASE = $(addprefix $(BUILD_DIR)/,$(SRC_FILES))

.PHONY: clean all test deploy content

all: content $(BASE) $(PHP)

content:
	rsync -aP --exclude="**.md" $(CONTENT_DIR)/ $(BUILD_DIR)

$(BUILD_DIR)/%: $(SRC_DIR)/%
	cp $< $@

$(BUILD_DIR)/%.php: $(CONTENT_DIR)/%.md $(SRC_DIR)/template.php
	pandoc --from markdown --to html --template $(SRC_DIR)/template.php $< -o $@

test:
	php -t $(BUILD_DIR) -S localhost:8080

clean:
	rm -rf $(BUILD_DIR)/*

deploy:
	rsync -azP --delete $(BUILD_DIR)/ 192.168.1.98:/mnt/hdd1/apache
