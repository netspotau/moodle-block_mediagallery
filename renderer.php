<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * mediagallery block renderer
 *
 * @package    block_mediagallery
 * @copyright  2014 NetSpot Pty Ltd
 * @author     Adam Olley <adam.olley@netspot.com.au>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die;

class block_mediagallery_renderer extends plugin_renderer_base {

    public function basic_search_form() {
        global $CFG;

        $advancedsearch = get_string('advancedsearch', 'block_mediagallery');

        $strsearch  = get_string('search');
        $strgo      = get_string('go');

        $o = html_writer::start_tag('div', array('class' => 'searchform'));
        $o .= html_writer::start_tag('form', array('action' => new moodle_url('/mod/mediagallery/search.php')));
        $o .= html_writer::start_tag('fieldset', array('class' => 'invisiblefieldset'));
        $o .= html_writer::tag('legend', $strsearch, array('class' => 'accesshide'));
        $o .= html_writer::empty_tag('input', array('name' => 'id', 'type' => 'hidden', 'value' => $this->page->course->id));
        $o .= html_writer::tag('label', $strsearch, array('class' => 'accesshide', 'for' => 'mediagallery_search'));
        $o .= html_writer::empty_tag('input', array('id' => 'mediagallery_search', 'name' => 'search', 'type' => 'text'));
        $o .= html_writer::tag('button', $strgo, array('id' => 'mediagallery_button', 'type' => 'submit', 'title' => $strsearch));
        $o .= html_writer::empty_tag('br');

        $url = new moodle_url('/mod/mediagallery/search.php', array('id' => $this->page->course->id));
        $o .= html_writer::link($url, $advancedsearch);
        $o .= $this->output->help_icon('search');
        $o .= html_writer::end_tag('fieldset');
        $o .= html_writer::end_tag('form');
        $o .= html_writer::end_tag('div');

        return $o;
    }

}
