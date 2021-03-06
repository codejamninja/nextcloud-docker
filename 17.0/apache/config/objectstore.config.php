<?php
if (getenv("OBJECTSTORE_CLASS")) {
    $CONFIG = array(
        'objectstore' => array(
            "class" => "OC\\Files\\ObjectStore\\".getenv("OBJECTSTORE_CLASS"),
            "arguments" => array(
                "bucket" => getenv("OBJECTSTORE_BUCKET"),
                "key" => getenv("OBJECTSTORE_KEY"),
                "region" => getenv("OBJECTSTORE_REGION"),
                "secret" => getenv("OBJECTSTORE_SECRET"),
                "use_ssl" => strtolower(getenv("OBJECTSTORE_USE_SSL")) == "true",
                'autocreate' => true,
            ),
        ),
        'filelocking.enabled' => false,
    );
    if (getenv("OBJECTSTORE_USE_PATH_STYLE")) {
        $CONFIG["objectstore"]["arguments"]["use_path_style"] = strtolower(getenv("OBJECTSTORE_USE_PATH_STYLE")) == "true";
    }
    if (getenv("OBJECTSTORE_HOSTNAME")) {
        $CONFIG["objectstore"]["arguments"]["hostname"] = getenv("OBJECTSTORE_HOSTNAME");
    }
    if (getenv("OBJECTSTORE_PORT")) {
        $CONFIG["objectstore"]["arguments"]["port"] = getenv("OBJECTSTORE_PORT");
    }
}
