#! /usr/bin/env python
import re, fileinput
from optparse import OptionParser


IGNOREDPREFIXES = [
    'PRAGMA',
    'BEGIN TRANSACTION;',
    'COMMIT;',
    'DELETE FROM sqlite_sequence;',
    'INSERT INTO "sqlite_sequence"',
]

def _replace(line):
    if any(line.startswith(prefix) for prefix in IGNOREDPREFIXES):
        return
    line = line.replace("CLOB", "LONGTEXT")
    line = line.replace("AUTOINCREMENT", "AUTO_INCREMENT")
    line = line.replace("DEFAULT 't'", "DEFAULT '1'")
    line = line.replace("DEFAULT 'f'", "DEFAULT '0'")
    line = line.replace(",'t'", ",'1'")
    line = line.replace(",'f'", ",'0'")
    return line


def _backticks(line, in_string):
    """Replace double quotes by backticks outside (multiline) strings

    >>> _backticks('''INSERT INTO "table" VALUES ('"string"');''', False)
    ('INSERT INTO `table` VALUES (\\'"string"\\');', False)

    >>> _backticks('''INSERT INTO "table" VALUES ('"Heading''', False)
    ('INSERT INTO `table` VALUES (\\'"Heading', True)

    >>> _backticks('''* "text":http://link.com''', True)
    ('* "text":http://link.com', True)

    >>> _backticks(" ');", True)
    (" ');", False)

    """
    new = ''
    for c in line:
        if not in_string:
            if c == "'":
                in_string = True
            elif c == '"':
                new = new + '`'
                continue
        elif c == "'":
            in_string = False
        new = new + c
    return new, in_string

def _process(opts, lines):
    if opts.database:
        yield '''\
drop database {d};
create database {d} character set utf8;
grant all on {d}.* to {u}@'%' identified by '{p}';
use {d};\n'''.format(d=opts.database, u=opts.username, p=opts.password)
    yield "SET sql_mode='NO_BACKSLASH_ESCAPES';\n"

    in_string = False
    for line in lines:
        if not in_string:
            line = _replace(line)
            if line is None:
                continue
        line, in_string = _backticks(line, in_string)
        yield line

def main():
    op = OptionParser()
    op.add_option('-d', '--database')
    op.add_option('-u', '--username')
    op.add_option('-p', '--password')
    opts, args = op.parse_args()

    lines = (l for l in fileinput.input(args))
    for line in _process(opts, lines):
        print line,


if __name__ == "__main__":
    main()
