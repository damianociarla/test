<?php

namespace UEC\MediaUploader\Core\Event;

class MediaEvents
{
    const AFTER_ANALYZE_ADAPTER         = 'uec_media_uploader.events.after_analyze_adapter';
    const AFTER_UPLOAD_MEDIA            = 'uec_media_uploader.events.after_upload_media';
    const BEFORE_INITIALIZE_MEDIA_TYPE  = 'uec_media_uploader.events.before_initialize_media_type';
    const BEFORE_SAVE_MEDIA             = 'uec_media_uploader.events.before_save_media';
    const AFTER_SAVE_MEDIA              = 'uec_media_uploader.events.after_save_media';
}