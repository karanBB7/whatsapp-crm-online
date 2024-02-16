
INSERT INTO `vtiger_tab` (`tabid`, `name`, `presence`, `tabsequence`, `tablabel`, `modifiedby`, `modifiedtime`, `customized`, `ownedby`, `isentitytype`, `trial`, `version`, `parent`, `source`, `issyncable`, `allowduplicates`, `sync_action_for_duplicates`) VALUES (50, 'whatsapp', 0, -1, 'Whatsapp', NULL, NULL, 0, 0, 1, 0, '2.1', '', NULL, 1, 1, 1);




INSERT INTO `vtiger_field` (`tabid`, `fieldid`, `columnname`, `tablename`, `generatedtype`, `uitype`, `fieldname`, `fieldlabel`, `readonly`, `presence`, `defaultvalue`, `maximumlength`, `sequence`, `block`, `displaytype`, `typeofdata`, `quickcreate`, `quickcreatesequence`, `info_type`, `masseditable`, `helpinfo`, `summaryfield`, `headerfield`, `isunique`) VALUES
(50, 853, 'commentcontent', 'vtiger_whatsapp', 1, '19', 'commentcontent', 'Comment', 1, 0, '', 100, 4, 98, 1, 'V~M', 0, 4, 'BAS', 2, '', 1, 0, 0),
(50, 854, 'related_to', 'vtiger_whatsapp', 1, '10', 'related_to', 'Related To', 1, 2, '', 100, 2, 99, 1, 'V~M', 2, 5, 'BAS', 2, '', 0, 0, 0),
(50, 855, 'parent_comments', 'vtiger_whatsapp', 1, '10', 'parent_comments', 'Related To Comments', 1, 2, '', 100, 7, 99, 1, 'V~O', 1, 0, 'BAS', 1, '', 0, 0, 0),
(50, 856, 'customer', 'vtiger_whatsapp', 1, '10', 'customer', 'Customer', 1, 2, '', 100, 6, 98, 3, 'V~O', 1, 0, 'BAS', 1, '', 0, 0, 0),
(50, 857, 'userid', 'vtiger_whatsapp', 1, '10', 'userid', 'UserId', 1, 2, '', 100, 7, 98, 3, 'V~O', 1, 0, 'BAS', 1, '', 0, 0, 0),
(50, 858, 'reasontoedit', 'vtiger_whatsapp', 1, '19', 'reasontoedit', 'ReasonToEdit', 1, 2, '', 100, 8, 98, 1, 'V~O', 1, 0, 'BAS', 1, '', 0, 0, 0),
(50, 859, 'is_private', 'vtiger_whatsapp', 1, '7', 'is_private', 'Is Private', 1, 2, '', 100, 9, 98, 1, 'I~O', 1, 0, 'BAS', 1, '', 0, 0, 0),
(50, 860, 'related_email_id', 'vtiger_whatsapp', 1, '1', 'related_email_id', 'Related Email Id', 1, 2, '0', 100, 11, 98, 1, 'I~O', 1, 0, 'BAS', 1, '', 0, 0, 0),
(50, 861, 'filename', 'vtiger_whatsapp', 1, '62', 'filename', 'Attachment', 1, 0, '', 100, 10, 98, 1, 'V~O', 1, 0, 'BAS', 1, '', 0, 0, 0),
(50, 862, 'smownerid', 'vtiger_crmentity', 1, '53', 'assigned_user_id', 'Assigned To', 1, 0, '', 100, 1, 99, 1, 'V~M', 0, 1, 'BAS', 2, '', 1, 0, 0),
(50, 863, 'createdtime', 'vtiger_crmentity', 1, '70', 'createdtime', 'Created Time', 1, 0, '', 100, 5, 99, 2, 'DT~O', 0, 2, 'BAS', 0, '', 0, 0, 0),
(50, 864, 'modifiedtime', 'vtiger_crmentity', 1, '70', 'modifiedtime', 'Modified Time', 1, 0, '', 100, 6, 99, 2, 'DT~O', 0, 3, 'BAS', 0, '', 0, 0, 0),
(50, 865, 'smcreatorid', 'vtiger_crmentity', 1, '52', 'creator', 'Creator', 1, 2, '', 100, 4, 99, 2, 'V~O', 1, 0, 'BAS', 1, '', 0, 0, 0),
(50, 866, 'source', 'vtiger_crmentity', 1, '1', 'source', 'Source', 1, 2, '', 100, 5, 98, 2, 'V~O', 3, 6, 'BAS', 0, '', 0, 0, 0);