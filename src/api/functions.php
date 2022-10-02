<?php

function pathJoin(/* variable args */) {
    return join(DIRECTORY_SEPARATOR, func_get_args());
}